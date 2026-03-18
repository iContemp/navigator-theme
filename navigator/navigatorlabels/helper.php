<?php
/**
 * Helper class for NavigatorHelper.
 * Provides access to customizable UI labels.
 * v20260317
 */

class helper_plugin_navigatorlabels extends DokuWiki_Plugin {

    // For labels settings
     
    public function label($key) {
        return $this->getConf('label_' . $key);
    }

    // for non-label settings
    // customlink_url → retrieved via $nav->value('customlink_url')
    public function value($key) {
        return $this->getConf($key);
    }

    // flag to open or not to open external top bar links in a new tab
    public function flag($key) {
    return (bool) $this->getConf($key);
    }

    public function customLinkData() {
        // Label: empty means disabled
        $label = trim($this->label('customlink'));
        if ($label === '') return null;

        // URL: fallback to start
        $url = trim($this->value('customlink_url'));
        if ($url === '') $url = 'start';

        // External vs internal
        if (!preg_match('/^https?:\/\//i', $url)) {
            $url = wl($url);
        }

        // New tab?
        $newtab = $this->flag('customlink_newtab')
            ? ' target="_blank" rel="noopener"'
            : '';

        return [
            'label'  => $label,
            'url'    => $url,
            'newtab' => $newtab
        ];
    }




}

