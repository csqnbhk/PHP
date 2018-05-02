<?php

   function getpage($page,$page_count,$sep=" ")
   {
         $url = $_SERVER['PHP_SELF'];
	 $start = ($page==1)?"首页":"<a href='{$url}?page=1'>首页</a>";
         $end = ($page>=$page_count)?"尾页":"<a href='{$url}?page={$page_count}'>尾页</a>";
         $prevpage = ($page>1)?($page-1):1;
	 $nextpage = ($page>=$page_count)?$page_count:($page+1);
	 $prev = ($page==1)?"上一页":"<a href='{$url}?page={$prevpage}'>上一页</a>";
	 $next = ($page==$page_count)?"下一页":"<a href='{$url}?page={$nextpage}'>下一页</a>";
	 
	 $str="总共有{$page_count}页,当前是第{$page}页→";
	 $p="";
	 for($i=1;$i<=$page_count;$i++)
	 {
	   if($page==$i)
	   {  
	    $p .="[{$i}]";
	   }
	   else
	   {
	     $p .="<a href='{$url}?page={$i}'>[{$i}]</a>";
	   }
	   
	 }
        $str_return=$str.$sep . $start.$sep . $prev.$sep . $next.$sep . $end.$sep;
        return $str_return;
   }
?>
