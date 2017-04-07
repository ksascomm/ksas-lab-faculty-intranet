<?php add_filter('the_content', 'pdf_addalt');
function pdf_addalt($content) {
       global $post;
       $pattern ="/<a(.*?)href=('|\")(.*?).(pdf)('|\")(.*?)>/i";
       $replacement = '<a$1 title="PDF Document" href=$2$3.$4$5$6 ><span class="screen-reader-text">PDF Document: </span>';
       $content = preg_replace($pattern, $replacement, $content);
       return $content;
}
                add_filter('the_content', 'word_addalt');
function word_addalt($content) {
       global $post;
       $pattern ="/<a(.*?)href=('|\")(.*?).(doc|docx)('|\")(.*?)>/i";
       $replacement = '<a$1 title="Word Document" href=$2$3.$4$5$6><span class="screen-reader-text">Word Document: </span>';
       $content = preg_replace($pattern, $replacement, $content);
       return $content;
}             
                add_filter('the_content', 'excel_addalt');
function excel_addalt($content) {
       global $post;
       $pattern ="/<a(.*?)href=('|\")(.*?).(xls|xlsx)('|\")(.*?)>/i";
       $replacement = '<a$1  title="Excel Document" href=$2$3.$4$5$6><span class="screen-reader-text">Excel Document: </span>';
       $content = preg_replace($pattern, $replacement, $content);
       return $content;
}
                add_filter('the_content', 'ppt_addalt');
function ppt_addalt($content) {
       global $post;
       $pattern ="/<a(.*?)href=('|\")(.*?).(ppt|pptx)('|\")(.*?)>/i";
      $replacement = '<a$1 title="PowerPoint Document" href=$2$3.$4$5$6><span class="screen-reader-text">PowerPoint Document: </span>';
       $content = preg_replace($pattern, $replacement, $content);
       return $content;
}

?>