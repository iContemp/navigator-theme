<?php
/**
 * AutoIndex Invisible Marker Plugin
 * Consumes the ~~AUTOINDEX~~ marker so it remains invisible when rendered.
 * Used by the Navigator theme to hide the marker cleanly.
 *
 * Author: Tony de Araujo
 * License: MIT (see LICENSE.txt in the plugin directory)
 * Since: 2026‑02‑01
 *
 * Notes:
 * - Registers a custom syntax mode to intercept the AUTOINDEX marker
 * - Outputs nothing, allowing Navigator to handle auto‑index generation
 * - Mirrors the behavior of other DokuWiki control instructions
 * - Designed to work seamlessly with the Navigator theme
 * v20260309c 
 */





// must be run within Dokuwiki, Navigator theme.

if(!defined('DOKU_INC')) die();

// class syntax_plugin_navigatorlabels extends DokuWiki_Syntax_Plugin {

class syntax_plugin_navigatorlabels extends DokuWiki_Syntax_Plugin {

    public function getType() {
        return 'substition';
    }

    public function getSort() {
        return 5;
    }

    
    public function connectTo($mode) {
        // $this->Lexer->addSpecialPattern('~~AUTOINDEX~~', $mode, 'plugin_navigatorhideautoindex');
        $marker = $this->getConf('marker_autoindex');
        $pattern = preg_quote($marker, '/');
        $this->Lexer->addSpecialPattern($pattern, $mode, 'plugin_navigatorlabels');

    }

    public function handle($match, $state, $pos, Doku_Handler $handler) {
        return [];
    }

    public function render($mode, Doku_Renderer $renderer, $data) {
        return true; // output nothing
    }
}
