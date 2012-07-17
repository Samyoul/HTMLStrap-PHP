<?php

    namespace htmlstrap;

    /**
     * Buttons
     * @author    Will
     *
     */
    class button extends element
    {

        protected $type = 'button';
        protected $text, $theme, $size, $icon;
        protected $tag_type;
        public $clear = TRUE;

        /*
        * Construct
        * @oa Will
        */
        public function __construct($text = 'Submit', $theme = 'default', $size = 'default', $icon = FALSE)
        {
            $this->text  = $text;
            $this->theme = $theme;
            $this->size  = $size;
            $this->icon  = $icon;

        }

        /*
        * Render
        * @oa	Will
        */
        public function render($name)
        {
            $this->add_attribute('class', 'btn');

            if ($this->theme != 'default') {
                $this->add_attribute('class', 'btn-' . $this->theme);
            }

            if ($this->size != 'default') {
                $this->add_attribute('class', 'btn-' . $this->size);
            }

            parent::render($name);

            if ($this->clear) {
                $this->html .= '<div>&nbsp;</div>';
            }

            switch ($this->tag_type) {
                default:
                case 'a':

                    break;
                case 'input':
                    $this->html .= '<input ' . $this->element_attributes . 'type ="' . $this->type . '" value="' . $this->text . '" />';
                    break;
            }

            return $this->html;
        }
    }

    /*
    * Submit
    * @oa	Will
    *
    */
    class submit extends button
    {
        protected $type = 'submit';
        protected $tag_type = 'input';
    }



