<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


?>
<div class="searchHomeForm"> 
      <div class="searchform">
      <form method="GET" action="?" name="searchForm" id="searchForm" class="search">
      <input type="text" name="q" size="30" value="">
      <select name="type">
              <option value="AllFields">All Fields</option>
              <option value="Title">Title</option>
              <option value="Author">Author</option>
              <option value="Subject">Subject</option>
              <option value="ISN">ISBN/ISSN</option>
            </select>
      <input type="submit" name="submit" value="Find">
      <a href="/vufindsmu/Search/Advanced" class="small">Advanced</a>
      <input type="hidden" name="task" value="search">

      </form>
      </div>
</div>

 