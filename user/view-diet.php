<?php
//session_start();
include("header.php");
include("nav.php");
?>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Diets</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item active">View Diets
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- Basic Inputs start -->

		<!-- Striped rows start -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
					</div>
					<div class="card-content collapse show">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										
										<th>#</th>
										<th>Breakfast</th>
										<th>Lunch</th>
										<th>Dinner</th>
										<th>Snack</th>
									</tr>
								</thead>
								<tbody>
								<tr>
									<td>Monday</td>
									<td>One poached egg and half a small avocado spread on one slice of Ezekiel bread, one orange. Total carbs: Approximately 39</td>
									<td>Mexican bowl: two-thirds of a cup low-sodium canned pinto beans, 1 cup chopped spinach, a quarter cup chopped tomatoes, a quarter cup bell peppers, 1 ounce (oz) cheese, 1 tablespoon (tbsp) salsa as sauce. Total carbs: Approximately 30.</td>
									<td>1 cup cooked lentil penne pasta, 1.5 cups veggie tomato sauce (cook garlic, mushrooms, greens, zucchini, and eggplant into it), 2 oz ground lean turkey. Total carbs: Approximately 35.</td>
									<td>20 1-gram baby carrots with 2 tbsp hummus. Total carbs: Approximately 21.</td>
								</tr>
								
								<tr>
									<td>Tuesday</td>
									<td>1 cup (100g) cooked oatmeal, three-quarters of a cup blueberries, 1 oz almonds, 1 teaspoon (tsp) chia seeds. Total carbs: Approximately 34</td>
									<td>Salad: 2 cups fresh spinach, 2 oz grilled chicken breast, half a cup chickpeas, half a small avocado, a half cup sliced strawberries, one quarter cup shredded carrots, 2 tbsp dressing. Total carbs: Approximately 52.</td>
									<td>Mediterranean couscous: two-thirds cup whole wheat cooked couscous, half a cup sautéed eggplant, four sundried tomatoes, five jumbo olives chopped, half a diced cucumber, 1 tbsp balsamic vinegar, fresh basil. Total carbs: Approximately 38.</td>
									<td>One small peach diced into one-third cup 2% cottage cheese. Total carbs: Approximately 16.</td>
								</tr>
								
								<tr>
									<td>Wednesday</td>
									<td>Two-egg veggie omelet (spinach, mushrooms, bell pepper, avocado) with a half cup black beans, three-quarters cup blueberries. Total carbs: Approximately 34.</td>
									<td>Sandwich: two regular slices high-fiber whole grain bread, 1 tbsp plain, no-fat Greek yogurt and 1 tbsp mustard, 2 oz canned tuna in water mixed with a quarter cup of shredded carrots, 1 tbsp dill relish, 1 cup sliced tomato, half a medium apple. Total carbs: Approximately 40.</td>
									<td>Half a cup (50g) succotash, 1 tsp butter, 2 oz pork tenderloin, 1 cup cooked asparagus, half a cup fresh pineapple. Total carbs: Approximately 34.</td>
									<td>1 cup unsweetened kefir. Total carbs: Approximately 12.</td>
								</tr>
								
								<tr>
									<td>Thursday</td>
									<td>Sweet potato toast: two slices (100 g) toasted sweet potato, topped with 1 oz goat cheese, spinach, and 1 tsp sprinkled flaxseed. Total carbs: Approximately 44.</td>
									<td>2 oz roast chicken, 1 cup raw cauliflower, 1 tbsp low-fat French dressing, 1 cup fresh strawberries. Total carbs: Approximately 23.</td>
									<td>A two-thirds cup of quinoa, 8 oz silken tofu, 1 cup cooked bok choy, 1 cup steamed broccoli, 2 tsp olive oil, one kiwi. Total carbs: Approximately 44.</td>
									<td>1 cup low-fat plain Greek yogurt mixed with half a small banana. Total carbs: Approximately 15.</td>
								</tr>
								
								<tr>
									<td>Friday</td>
									<td>A one-third cup of Grape-Nuts (or similar high-fiber cereal), half a cup blueberries, 1 cup unsweetened almond milk. Total carbs: Approximately 41.</td>
									<td>Salad: 2 cups spinach, a quarter cup tomatoes, 1 oz cheddar cheese, one boiled chopped egg, 2 tbsp yogurt dressing, a quarter cup grapes, 1 tsp pumpkin seeds, 2 oz roasted chickpeas. Total carbs: Approximately 47.</td>
									<td>2 oz salmon filet, one medium baked potato, 1 tsp butter, 1.5 cups steamed asparagus. Total carbs: Approximately 39.</td>
									<td>1 cup celery with 1 tbsp peanut butter. Total carbs: Approximately 6.</td>
								</tr>
								
								<tr>
									<td>Saturday</td>
									<td>1 cup low-fat plain Greek yogurt sweetened with half a banana mashed, 1 cup strawberries, 1 tbsp chia seeds. Total carbs: Approximately 32.</td>
									<td>Tacos: two corn tortillas, a one-third cup cooked black beans, 1 oz low-fat cheese, 2 tbsp avocado, 1 cup coleslaw, salsa as dressing. Total carbs: Approximately 70.</td>
									<td>Half medium baked potato with skin, 2 oz broiled beef, 1 tsp butter, 1.5 cups steamed broccoli with 1 tsp nutritional yeast sprinkled on top, three-quarters cup whole strawberries. Total carbs: Approximately 41.</td>
									<td>One cherry tomato and 10 baby carrots with 2 tbsp hummus. Total carbs: Approximately 14.</td>
								</tr>
								
								<tr>
									<td>Sunday</td>
									<td>Chocolate peanut oatmeal: 1 cup cooked oatmeal, 1 scoop chocolate vegan or whey protein powder, 1 tbsp peanut butter, 1 tbsp chia seeds. Total carbs: Approximately 21.</td>
									<td> One small whole wheat pita pocket, half a cup cucumber, half a cup tomatoes, half a cup lentils, half a cup leafy greens, 2 tbsp salad dressing. Total carbs: Approximately 30.</td>
									<td>2 oz boiled shrimp, 1 cup green peas, 1 tsp butter, half a cup cooked beets, 1 cup sauteed Swiss chard, 1 tsp balsamic vinegar. Total carbs: Approximately 39.</td>
									<td>1 oz almonds, one small grapefruit. Total carbs: Approximately 26.</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
<!-- Striped rows end -->


       </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

 <?php
 include("footer.php");
 ?>