<?php get_header(); ?>

<section id="page-wrap">
	<div class="wrapper container">
		<div class="row">
			<figure class="col-md-3">
				<p><strong>Lorem </strong>ipsum dolor sit amet, consectetur adipiscing elit. Nulla blandit lacus eget pellentesque rutrum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean vel elementum massa. Aenean vehicula in ante ac fermentum. Proin pellentesque sollicitudin tellus, et imperdiet nulla pharetra id. Nunc erat dolor, sodales gravida magna eu, fringilla cursus erat. Nunc tempor aliquet leo quis auctor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed porttitor, dui vel suscipit laoreet, ante velit consequat neque, a dictum sem augue vel nisl. Nam ante justo, varius nec ipsum in, porttitor vehicula dui. Aenean in nisl ipsum. </p>
			</figure>
			<figure class="col-md-3">
				<p>Lorem <span>ipsum</span> dolor sit amet, <a href="#" title="">consectetur</a> adipiscing elit. Nulla blandit lacus eget pellentesque rutrum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean vel elementum massa. Aenean vehicula in ante ac fermentum. Proin pellentesque sollicitudin tellus, et imperdiet nulla pharetra id. Nunc erat dolor, sodales gravida magna eu, fringilla cursus erat. Nunc tempor aliquet leo quis auctor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed porttitor, dui vel suscipit laoreet, ante velit consequat neque, a dictum sem augue vel nisl. Nam ante justo, varius nec ipsum in, porttitor vehicula dui. Aenean in nisl ipsum. </p>
			</figure>
			<figure class="col-md-3">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla blandit lacus eget pellentesque rutrum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean vel elementum massa. Aenean vehicula in ante ac fermentum. Proin pellentesque sollicitudin tellus, et imperdiet nulla pharetra id. Nunc erat dolor, sodales gravida magna eu, fringilla cursus erat. Nunc tempor aliquet leo quis auctor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed porttitor, dui vel suscipit laoreet, ante velit consequat neque, a dictum sem augue vel nisl. Nam ante justo, varius nec ipsum in, porttitor vehicula dui. Aenean in nisl ipsum. </p>
			</figure>
			<figure class="col-md-3">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla blandit lacus eget pellentesque rutrum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean vel elementum massa. Aenean vehicula in ante ac fermentum. Proin pellentesque sollicitudin tellus, et imperdiet nulla pharetra id. Nunc erat dolor, sodales gravida magna eu, fringilla cursus erat. Nunc tempor aliquet leo quis auctor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed porttitor, dui vel suscipit laoreet, ante velit consequat neque, a dictum sem augue vel nisl. Nam ante justo, varius nec ipsum in, porttitor vehicula dui. Aenean in nisl ipsum. </p>
			</figure>
		</div>
	</div>
	<div class="wrapper container">
		<div class="row" ng-controller="HomeCrtl">
			<div class="col-md-12">
				<ul class="list-group">
					<li class="list-group-item" ng-repeat="post in postdata">
						<p>{{post.title}}</p>
						<p>{{post.content}}</p>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>