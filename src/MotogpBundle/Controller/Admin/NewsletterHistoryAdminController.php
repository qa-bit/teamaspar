<?php
namespace MotogpBundle\Controller\Admin;
use MotogpBundle\Entity\NewsletterHistory;
use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Finder\Exception\AccessDeniedException;


class NewsletterHistoryAdminController extends Controller
{
    /**
     * List action.
     *
     * @throws AccessDeniedException If access is not granted
     *
     * @return Response
     */
    public function listAction()
    {
        $request = $this->getRequest();

        $this->admin->checkAccess('list');

        $preResponse = $this->preList($request);
        if (null !== $preResponse) {
            return $preResponse;
        }

        if ($listMode = $request->get('_list_mode')) {
            $this->admin->setListMode($listMode);
        }

        $datagrid = $this->admin->getDatagrid();
        $pager = $datagrid->getPager();
        $pager->setMaxPerPage(1);
        $formView = $datagrid->getForm()->createView();

        $data = $this->getDoctrine()->getRepository(NewsletterHistory::class)->findAll();

        $stats = [];

        foreach ($data as $s) {

            $newsletter = $s->getNewsletter();

            if (!isset($stats[$newsletter->getId()])) {
                $stats[$newsletter->getId()] = [
                    'newsletterName' => $newsletter->getName(),
                    'newsletterPost' => $newsletter->getPost() ? $newsletter->getPost()->getName() : '',
                    'count' => 1,
                    'groups' => []
                ];

                foreach ($newsletter->getGroups() as $g) {
                    $stats[$newsletter->getId()]['groups'] = [
                        'groupId' => $g->getId(),
                        'groupName' => $g->getName(),
                    ];
                }
            } else {
                $stats[$newsletter->getId()]['count']++;
            }
        }



        usort($stats, function ($a, $b) {
                if($a['count'] == $b['count']) return 0;
                if($a['count'] > $b['count']) return -1;
                return 1;
            }
        );

        // set the theme for the current Admin Form
        //$this->setFormTheme($formView, $this->admin->getFilterTheme());

        return $this->renderWithExtraParams($this->admin->getTemplate('list'), [
            'action' => 'list',
            'stats' => $stats,
            'form' => $formView,
            'datagrid' => $datagrid,
            'csrf_token' => $this->getCsrfToken('sonata.batch'),
            'export_formats' => $this->has('sonata.admin.admin_exporter') ?
                $this->get('sonata.admin.admin_exporter')->getAvailableFormats($this->admin) :
                $this->admin->getExportFormats(),
        ], null);
    }

}