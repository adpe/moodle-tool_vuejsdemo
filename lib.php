<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package     tool_vuejsdemo
 * @copyright   2018 Citricity Guy Thomas <dev@citri.city>
 * @author      2019 Adrian Perez <p.adrian@gmx.ch> {@link https://adrianperez.me}
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

/**
 * Serves 3rd party js files.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */
function tool_vuejsdemo_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    global $CFG;

    $pluginpath = $CFG->dirroot . '/admin/tool/vuejsdemo/';

    if ($filearea === 'js') {
        // CDN fall backs would go in "js" folder.
        $path = $pluginpath . 'js/' . implode('/', $args);
        //echo file_get_contents($path);
        return file_get_contents($path);
    } else if ($filearea === 'vue') {
        // Vue components.
        $jsfile = array_pop($args);
        $compdir = basename($jsfile, '.js');
        $umdfile = $compdir . '.umd.js';
        $args[] = $compdir;
        $args[] = 'dist';
        $args[] = $umdfile;
        $path = $pluginpath . 'vue/' . implode('/', $args);
        return file_get_contents($path);
    } else {
        send_file_not_found();
    }
}
