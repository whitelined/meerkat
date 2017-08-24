<?php
namespace Meerkat\Config;

const server_default_object='Index';
const server_qs_language='lang';
const server_qs_object='d7';

const local_root='/home/aaron/meerkat/';
const local_lib='/home/aaron/meerkat/lib/';
const local_content='/home/aaron/meerkat/content/';
const local_webojects='/home/aaron/meerkat/content/webobjects/';
const local_views='/home/aaron/meerkat/content/views/';

\Meerkat\Core\Manifest::AddWebObject('Index',new \Meerkat\Core\Route('/','_Default'));

?>
