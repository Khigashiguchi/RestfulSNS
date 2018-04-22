<?php
namespace Khigashiguchi\RestfulSNS\Form;

use Aura\Html\Helper\Tag;
use Ray\WebFormModule\AbstractForm;

class ArticleForm extends AbstractForm
{
    public function __toString()
    {
        $form = $this->form([
           'method' => 'post',
           'action' => '/create',
        ]);
        /* @var Tag tag */
        $tag = $this->helper->get('tag');

        // user_id
        $form .= $tag('div', ['class' => 'form-group']);
        $form .= $this->helper->tag('label', ['for' => 'title']);
        $form .= 'UserId';
        $form .= $this->helper->tag('/label') . PHP_EOL;
        $form .= $this->input('user_id');
        $form .= $this->error('user_id');
        $form .= $this->helper->tag('/div') . PHP_EOL;

        // title
        $form .= $tag('div', ['class' => 'form-group']);
        $form .= $this->helper->tag('label', ['for' => 'title']);
        $form .= 'Title';
        $form .= $this->helper->tag('/label') . PHP_EOL;
        $form .= $this->input('title');
        $form .= $this->error('title');
        $form .= $this->helper->tag('/div') . PHP_EOL;

        // description
        $form .= $tag('div', ['class' => 'form-group']);
        $form .= $this->helper->tag('label', ['for' => 'title']);
        $form .= 'Description';
        $form .= $this->helper->tag('/label') . PHP_EOL;
        $form .= $this->input('description');
        $form .= $this->error('description');
        $form .= $this->helper->tag('/div') . PHP_EOL;

        // status
        $form .= $tag('div', ['class' => 'form-group']);
        $form .= $this->helper->tag('label', ['for' => 'title']);
        $form .= 'Status';
        $form .= $this->helper->tag('/label') . PHP_EOL;
        $form .= $this->input('status');
        $form .= $this->error('status');
        $form .= $this->helper->tag('/div') . PHP_EOL;

        // submit
        $form .= $this->input('submit');
        $form .= $this->helper->tag('/form');

        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->setField('user_id')
            ->setAttribs([
                'id' => 'user_id',
                'name' => 'user_id',
                'class' => 'form-control',
                'size' => 10
            ]);
        $this->setField('title')
            ->setAttribs([
                'id' => 'title',
                'name' => 'title',
                'class' => 'form-control',
                'size' => 20
            ]);
        $this->setField('description')
            ->setAttribs([
                'id' => 'description',
                'name' => 'description',
                'class' => 'form-control',
                'size' => 40
            ]);
        $this->setField('status')
            ->setAttribs([
                'id' => 'status',
                'name' => 'status',
                'class' => 'form-control',
                'size' => 10
            ]);
        $this->setField('submit', 'submit')
            ->setAttribs([
                'name' => 'submit',
                'value' => 'Send',
                'class' => 'btn btn-primary'
            ]);
        // form validation
        $this->filter->validate('title')->is('strlenMin', 3);
        $this->filter->useFieldMessage('title', 'Min 3 Characters required');
    }
}
