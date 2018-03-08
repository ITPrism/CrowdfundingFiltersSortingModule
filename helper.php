<?php
/**
 * @package      Crowdfunding
 * @subpackage   Modules
 * @author       Todor Iliev
 * @copyright    Copyright (C) 2017 Todor Iliev <todor@itprism.com>. All rights reserved.
 * @license      GNU General Public License version 3 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

class CrowdfundingFiltersSortingModuleHelper
{
    /**
     * Generates a link that will be used for sorting results.
     *
     * @throws \InvalidArgumentException
     * @return string
     */
    public static function orderByLink($label, $orderBy, $options, $class = "")
    {
        $html = array();

        $orderedBy   = Joomla\Utilities\ArrayHelper::getValue($options, 'order_by', 0, 'int');
        $orderedDir  = Joomla\Utilities\ArrayHelper::getValue($options, 'order_dir', 'ASC');
        $oppositeDir = Joomla\Utilities\ArrayHelper::getValue($options, 'opposite_dir', 'DESC');

        $elementClass = (!empty($class)) ? ' class="'.$class.'"' : "";
        $iconClass = (strcmp('ASC', $orderedDir) == 0) ? 'fa fa-caret-up': 'fa fa-caret-down';

        $parameters = array(
            'filter_order'     => $orderBy,
            'filter_order_Dir' => ($orderedBy === $orderBy) ? $oppositeDir : $orderedDir
        );

        $html[] = '<div '.$elementClass.'>';
        $html[] = '<a href="'.JRoute::_(CrowdfundingHelperRoute::getDiscoverRoute($parameters)).'">'.$label.'</a>';

        if ($orderedBy === $orderBy) {
            $html[] = '<span class="' . $iconClass . '"></span>';
        }
        $html[] = '</div>';

        return implode("\n", $html);
    }
}
