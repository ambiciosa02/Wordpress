<?php
class Shopcozi_Section_Plus extends WP_Customize_Section{

    public $type = 'shopcozi-pro';
    public $plus_text = '';
    public $plus_url = '';
    public $id = '';
  
    public function json() {
        $json = parent::json();
        $json['plus_text'] = $this->plus_text;
        $json['plus_url']  = $this->plus_url;
        $json['id'] = $this->id;
        return $json;
    }

    protected function render_template() { ?>

        <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
            <h3 class="accordion-section-title">
                {{ data.title }}

                <# if ( data.plus_text && data.plus_url ) { #>
                    <a href="{{ data.plus_url }}" class="button button-primary alignright" target="_blank">{{ data.plus_text }}</a>
                <# } #>
            </h3>
        </li>
    <?php }
}