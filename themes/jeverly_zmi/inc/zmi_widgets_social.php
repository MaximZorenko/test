<?php

class zmi_widgets_social extends WP_Widget{
    public function __construct(){
        parent::__construct('zmi_widgets_social', 'Социальные ссылки footer', [
            'name' => 'Социальные ссылки footer',
            'description' => 'Текстовый вывод описание'
        ]);
    }
    public $social_link = [
        'Facebook' => ['Facebook'],
        'Pinterest' => ['Pinterest'],
        'Instagram' => ['Instagram'],
      
    ];
    //настройка формы в админке
    public function form( $instance ){ ?>
        <p>
            <label for="<?php echo $this->get_field_id('id-link'); ?>">
                Введите ссылку:
            </label>
            <input 
                type="text" 
                id='<?php echo $this->get_field_id('id-link'); ?>' 
                name='<?php echo $this->get_field_name('link') ?>' 
                value='<?php echo $instance['link'] ?>'
                class='widefat'
            >
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('id-slag'); ?>">
                Выберите социальную сеть:
            </label>
            <select  
                id='<?php echo $this->get_field_id('id-slag'); ?>' 
                name='<?php echo $this->get_field_name('slag') ?>' 
                class='widefat'
            >
                <?php foreach($this->social_link as $k=>$v): ?>
                    <option value="<?=$k?>"  <?php selected($instance['slag'], $k, true) ?> >
                        <?=$v[0]; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>

    <?php }
    ///настройка вывода на странице
    public function widget($args, $instance ){
        // print_r($instance['link']);
        $str = "<a class='a_icons' href='". $instance['link'] ."'>". $instance['slag'] ."</a>";
        echo $str;
    }
    ////необходим для обновления в БД
    public function update( $new_instance, $old_instance ){
        return $new_instance;

    }
}

?>