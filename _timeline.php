<?php
/**
 * @file _timeline.php
 * @brief module that display timeline
 *
 * It embeds the timeline using the timeline script and a json file.
 * we use the Timeline.accdb to list events in the timeline and a python script to build the timeline.json. 
 * 
 * @author Nathalie Castells-Brooke
 * @email nathalie.castells@rothamsted.ac.uk
 *
 */

?>


<ul class="list-group mx-3">
	<li class="list-group-item ">
		<div id='timeline-embed' style="width: 100%; height: 500px"></div> <script
			src="https://cdn.knightlab.com/libs/timeline3/latest/js/timeline.js"></script>
		<script type="text/javascript">
          var timeline_json = <?php echo $timeline; ?>; // replace make_the_json() with the JSON object you created
          // two arguments: the id of the Timeline container (no '#')
          // and the JSON object or an instance of TL.TimelineConfig created from
          // a suitable JSON object
          window.timeline = new TL.Timeline('timeline-embed', timeline_json);
        </script>
	</li>
</ul>