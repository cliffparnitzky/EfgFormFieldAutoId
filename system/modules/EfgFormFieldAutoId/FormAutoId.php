<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>. 
 *
 * PHP version 5
 * @copyright  Cliff Parnitzky 2012
 * @author     Cliff Parnitzky
 * @package    EfgFormFieldAutoId
 * @license    LGPL
 */

/**
 * Class FormAutoId
 *
 * Form field "autoId".
 * @copyright  Cliff Parnitzky 2012
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class FormAutoId extends Widget
{
	/**
	 * Submit user input
	 * @var boolean
	 */
	protected $blnSubmitInput = true; 
	
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'form_widget';
	
	/**
	 * Generate the widget and return it as string
	 * @return string
	 */
	public function generate()
	{
		$spanValue = $this->varValue;
		if (strlen($this->varValue) == 0 && $this->autoIdShowWhileCreation && strlen($this->autoIdAutoCreationMessage) > 0) {
			// this record is new and displaying is on
			$spanValue = $this->autoIdAutoCreationMessage;
		}

		return sprintf('<span id="ctrl_%s_span" class="text%s">%s</span><input type="hidden" name="%s" value="%s"/>',
						$this->strId,
						(strlen($this->strClass) ? ' ' . $this->strClass : ''),
						$spanValue,
						$this->strName,
						specialchars($this->varValue));
	}
}

?>