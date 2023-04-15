<?php

namespace App\Admin\Controllers;

use App\Models\Habitation;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class HabitationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Habitation';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Habitation());

        $grid->column('id', __('Id'));
//        $grid->column('user_id', __('User id'));
        $grid->column('name', __('Name'));
        $grid->column('description', __('Description'));
        $grid->column('price', __('Price'));
//        $grid->column('id_type_habitation', __('Id type habitation'));
//        $grid->column('id_part_type_habitation', __('Id part type habitation'));
//        $grid->column('latitude', __('Latitude'));
//        $grid->column('longitude', __('Longitude'));
        $grid->column('city', __('City'));
        $grid->column('street', __('Street'));
        $grid->column('house', __('House'));
        $grid->column('floor', __('Floor'));
        $grid->column('count_guests', __('Count guests'));
//        $grid->column('ids_advantages', __('Ids advantages'));
//        $grid->column('ids_photo', __('Ids photo'));
//        $grid->column('finished', __('Finished'));
//        $grid->column('question', __('Question'));
        $grid->column('moderate', __('Moderate'))->switch();
        $grid->column('Photos', __('Photos'))->display(function (){
            $images = $this->images()->get()->pluck('path');
            return json_decode($images, true);
        })->image('https://yvvdev.site/', 100, 100);




        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->like('moderate', 'moderate');

        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Habitation::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('price', __('Price'));
        $show->field('id_type_habitation', __('Id type habitation'));
        $show->field('id_part_type_habitation', __('Id part type habitation'));
        $show->field('latitude', __('Latitude'));
        $show->field('longitude', __('Longitude'));
        $show->field('city', __('City'));
        $show->field('street', __('Street'));
        $show->field('house', __('House'));
        $show->field('floor', __('Floor'));
        $show->field('count_guests', __('Count guests'));
        $show->field('ids_advantages', __('Ids advantages'));
        $show->field('ids_photo', __('Ids photo'));
        $show->field('finished', __('Finished'));
        $show->field('question', __('Question'));
        $show->field('moderate', __('Moderate'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Habitation());

        $form->number('user_id', __('User id'));
        $form->text('name', __('Name'));
        $form->text('description', __('Description'));
        $form->number('price', __('Price'));
        $form->number('id_type_habitation', __('Id type habitation'));
        $form->number('id_part_type_habitation', __('Id part type habitation'));
        $form->decimal('latitude', __('Latitude'));
        $form->decimal('longitude', __('Longitude'));
        $form->text('city', __('City'));
        $form->text('street', __('Street'));
        $form->number('house', __('House'));
        $form->number('floor', __('Floor'));
        $form->number('count_guests', __('Count guests'));
        $form->text('ids_advantages', __('Ids advantages'));
        $form->text('ids_photo', __('Ids photo'));
        $form->number('finished', __('Finished'))->default(1);
        $form->number('question', __('Question'))->default(1);
        $form->switch('moderate', __('Moderate'));

        return $form;
    }
}
