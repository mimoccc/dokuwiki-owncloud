<?php
/**
 * This syntax plugin overwrites the defaultdokuwiki image rendering. It uses the fileid
 * ftom the owncloud-database to link the image, and not the imagepath.
 * The Image also provides the the imagebox from the imagebox-plugin written by 
 * FFTiger <fftiger@wikisquare.com>, myst6re <myst6re@wikisquare.com>. see 
 * https://www.dokuwiki.org/plugin:imagebox for the original code. The style.css and
 * most code for the thumbnails from the imagebox-plugin is used here.

 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Martin Schulte <lebowski[at]corvus[dot]uberspace[dot]de>
 */

if(!defined('DOKU_INC')) define('DOKU_INC',realpath(dirname(__FILE__).'/../../').'/');
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');

require_once(DOKU_PLUGIN.'syntax.php');

class syntax_plugin_owncloud extends DokuWiki_Syntax_Plugin {

	function getInfo(){
		return array(
			'author' => 'Martin Schulte',
			'email'  => 'lebowski[at]corvus[dot]uberspace[dot]de',
			'date'   => '2013-04-14',
			'name'   => 'ownCloud Plugin',
			'desc'   => 'Uses ownCloud fileID instead filepathes'
		);
	}

	function getType(){
		return 'substition';
	}
	
	function getAllowedTypes() {
		return array('substition','disabled','formatting');
	}
	
	function getSort(){
		return 319;  // before Dokuwiki-media-parser (320)
	}
	function getPType(){
		return 'normal';
	}
	
	function connectTo($mode) {
		//$this->Lexer->addSpecialPattern("\{\{[^\}]+\}\}",$mode,'plugin_owncloud');
		//$this->Lexer->addSpecialPattern("\[\{\{[^\}]+\}\}\]",$mode,'owncloud');
		
	}

	function handle($match, $state, $pos, &$handler){
		$match= Doku_Handler_Parse_Media($match);
		 return array($match, $state, $pos);
	}

	function render($mode, &$renderer, $data){
		list($match, $state, $pos) = $data;
		//$a=var_export($match);
		//$a=html_revisions(0,":wiki:ds1.png");
		$a="Hallo Welt";
		$renderer->doc.= var_export($match);
		return TRUE;
	}
}

//Setup VIM: ex: et ts=4 enc=utf-8 :
