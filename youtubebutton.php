<?php

 // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

class plgButtonYoutubebutton extends JPlugin {

    function plgButtonYoutubebutton(& $subject, $config)
    {
        parent::__construct($subject, $config);
    }
    function onDisplay($name)
    {
        $js =  "function sampleYoutubeButtonClick(editor) {
					txt = prompt('Vpiši Youtube video ID','V8xSUah_yO8');
					if (!txt) return;
					jInsertEditorText('<div class=\"embed-container\"><iframe class=\"smartify\" width=\"560\" height=\"315\" data-src=\"https://www.youtube.com/embed/'+txt+'\" frameborder=\"0\" allowfullscreen></iframe></div>', editor);
				}";
				
        $doc = JFactory::getDocument();
        $doc->addScriptDeclaration($js);
		
	    $button = new JObject;		
		$button->modal = false;
		$button->class = 'btn';
		$button->link = '#';
		$button->text = JText::_('Youtube Video');
		$button->name = 'wand';
		$button->onclick = 'sampleYoutubeButtonClick(\''.$name.'\'); return false;';
		
        return $button;
    }
}
