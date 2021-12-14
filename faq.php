<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- title of the page  -->
    <title>Faqs | AirBar</title>

    <!-- css stylesheets -->
    <link rel="stylesheet" href="Css/faq.css">

    <!-- favicon -->
    <link rel="icon" href="Images/favicon.png" type="image/png">

    <!-- javascript files -->
    <script>document.getElementsByTagName("html")[0].className += " js";</script>
    <script defer src="Js/util.js"></script>
	<script defer src="Js/faq.js"></script>

</head>

<body>

    <?php 

        include("Includes/header.php");
    ?>

    <div class="cd-header flex flex-column flex-center">
		<div class="text-component text-center">
			<h1>FREQUENTLY ASKED QUESTIONS</h1>
		</div>
    </div>

	<section style="font-size:2rem;" class="cd-faq js-cd-faq container max-width-md margin-top-lg margin-bottom-lg">
		<ul class="cd-faq__categories">
			<li><a class="cd-faq__category cd-faq__category-selected truncate" href="#basics">Basics</a></li>
			<li><a class="cd-faq__category truncate" href="#mobile">Flight Details</a></li>
			<li><a class="cd-faq__category truncate" href="#account">Account</a></li>
			<li><a class="cd-faq__category truncate" href="#payments">Payments</a></li>
			<li><a class="cd-faq__category truncate" href="#privacy">Privacy</a></li>
			<li><a class="cd-faq__category truncate" href="#Travel Information">Travel information</a></li>
		</ul> <!-- cd-faq__categories -->

		<div class="cd-faq__items">
			<ul id="basics" class="cd-faq__group">
				<li class="cd-faq__title">
					<h2>Basics</h2>
				</li>
				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>What is online booking and how do I use it?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>. Online booking is a convenient way of booking your travel over the internet. Using the
								Airbar online services, you can:
								• Book a flight and pay online for your travel
								• Request for a particular seat
								• Redeem your frequent flyer miles online
								• Web Check in
							</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>

				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>How do I use the online booking service?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>You can start by visiting "Book Online” option of this site. You will then have to follow
								the process of:
								• Search - Find a suitable flight/routing/date
								• Select - Display of fares and selection of suitable fares
								• Passengers & Payments – Inserting details of passengers and payment details on a
								secured site
								• Confirmation - Getting a confirmation of the booking details.
							</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>

				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>Can people who have tested COVID-19 positive can travel?
						</span></a>
					<div class="cd-faq__content">
						<div class="text-compone">
							<p>COVID-19 tested Positive people cannot travel .The people who are fully vaccinated and
								have both the vaccinated certificate can only travel through our services.
							</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>

				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>How can I protect myself from COVID-19 ?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>Maintaining physical distance of 6 feet from others to prevent COVID-19.
								Protect yourself from COVID-19 by getting fully vaccinated and by wearing a mask.
								Wearing a mask over your nose and mouth is required on in indoor areas of planes,.</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>
			</ul> <!-- cd-faq__group -->

			<ul id="mobile" class="cd-faq__group">
				<li class="cd-faq__title">
					<h2>Flight Details</h2>
				</li>
				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>What flights are available for online bookings on
							https://airbar.herokuapp.com ?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>Online booking is available on Airbar operated flights, on all cities on the
								airbar.herokuapp network and on certain AI code share flights.</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>

				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>How can i add flight,delete flight details?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>I can add flight details by click on the add flight button.
								I can delete flight details by click on the delete flight button.
							</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>

				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>How can I book a one way or round trip?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>Select the "One way” option on the "Book Flight” page for one-way travel. The "Round
								Trip” option for a person to travel to one place and then return back to the place he or
								she left. .</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>
			</ul> <!-- cd-faq__group -->

			<ul id="account" class="cd-faq__group">
				<li class="cd-faq__title">
					<h2>Account</h2>
				</li>
				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>How do I change my password?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis earum autem
								consectetur labore eius tenetur esse, in temporibus sequi cum voluptatem vitae repellat
								nostrum odio perspiciatis dolores recusandae necessitatibus, unde, deserunt voluptas
								possimus veniam magni soluta deleniti! Architecto, quidem, totam. Fugit minus odit unde
								ea cupiditate ab aperiam sed dolore facere nihil laboriosam dolorum repellat deleniti
								aliquam fugiat laudantium delectus sint iure odio, necessitatibus rem quisquam! Ipsum
								praesentium quam nisi sint, impedit sapiente facilis laudantium mollitia quae fugiat
								similique. Dolor maiores aliquid incidunt commodi doloremque rem! Quaerat, debitis
								voluptatem vero qui enim, sunt reiciendis tempore inventore maxime quasi fugiat
								accusamus beatae modi voluptates iste officia esse soluta tempora labore quisquam fuga,
								cum. Sint nemo iste nulla accusamus quam qui quos, vero, minus id. Eius mollitia
								consequatur fugit nam consequuntur nesciunt illo id quis reprehenderit obcaecati
								voluptates corrupti, minus! Possimus, perspiciatis!</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>

				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>How do I delete my account?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo tempore soluta, minus
								magnam non blanditiis dolore, in nam voluptas nobis minima deserunt deleniti id animi
								amet, suscipit consequuntur corporis nihil laborum facere temporibus. Qui inventore,
								doloribus facilis, provident soluta voluptas excepturi perspiciatis fugiat odit vero!
								Optio assumenda animi at! Assumenda doloremque nemo est sequi eaque, ipsum id, labore
								rem nisi, amet similique vel autem dolore totam facilis deserunt. Mollitia non ut libero
								unde accusamus praesentium sint maiores, illo, nemo aliquid?</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>

				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>How do I change my account settings?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis,
								reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit,
								magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>

				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>I forgot my password. How do I reset it?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum at aspernatur iure facere
								ab a corporis mollitia molestiae quod omnis minima, est labore quidem nobis accusantium
								ad totam sunt doloremque laudantium impedit similique iste quasi cum! Libero fugit at
								praesentium vero. Maiores non consequuntur rerum, nemo a qui repellat quibusdam
								architecto voluptatem? Sequi, possimus, cupiditate autem soluta ipsa rerum officiis cum
								libero delectus explicabo facilis, odit ullam aperiam reprehenderit! Vero ad non harum
								veritatis tempore beatae possimus, ex odio quo.</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>
			</ul> <!-- cd-faq__group -->

			<ul id="payments" class="cd-faq__group">
				<li class="cd-faq__title">
					<h2>Payments</h2>
				</li>
				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>What is Convenience Fee?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>A non- refundable convenience fee of INR 300 for domestic and INR 500 for international
								per person per flight for Net banking/Credit Cards/Debit Cards payement is collected by
								the airlines for establishing, maintaining and operating the online flight booking
								system. This fee includes the charges paid by the airlines to the concerned Bank (varies
								from one Bank to another) for availing of such facilities.</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>

				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>How can I pay for my ticket online, what are the payment
							methods?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>Customer can use debit /credit card issued by Master/Visa and Paypal.You can get a
								confirmation mailafter the payemnt is done.</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>

				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>What are the details of card used for online
							payement?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>Details of card used for online payment are Owner name,CVV,Card Number,Expiry date.</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>
			</ul> <!-- cd-faq__group -->

			<ul id="privacy" class="cd-faq__group">
				<li class="cd-faq__title">
					<h2>Privacy</h2>
				</li>
				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>Can I specify my own private key?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum
								eligendi mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto
								architecto impedit explicabo repudiandae qui similique aut iure ipsum quis inventore
								nulla error aliquid alias quia dolorem dolore, odio excepturi veniam odit veritatis. Quo
								iure magnam, et cum. Laudantium, eaque non? Tempore nihil corporis cumque dolor ipsum
								accusamus sapiente aliquid quis ea assumenda deserunt praesentium voluptatibus,
								accusantium a mollitia necessitatibus nostrum voluptatem numquam modi ab, sint rem.</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>

				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>My files are missing! How do I get them back?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis,
								reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit,
								magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>

				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>How can I access my account data?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus magni vero deserunt
								enim et quia in aliquam, rem tempore voluptas illo nisi veritatis quas quod placeat
								ipsa! Error qui harum accusamus incidunt at libero ipsum, suscipit dolorum esse
								explicabo in eius voluptates quidem voluptatem inventore amet eaque deserunt veniam
								dignissimos excepturi? Dolore, quo amet nostrum autem nemo. Sit nam assumenda, corporis
								ea sunt distinctio nostrum doloribus alias, beatae nesciunt dolore saepe consequuntur
								minima eveniet porro dolor officiis maiores ab obcaecati officia enim aliquam. Itaque
								fuga molestiae hic accusantium atque corporis quia id sequi enim vero? Hic aperiam sint
								facilis aliquam quia, accusamus tenetur earum totam enim est, error. Iusto, reiciendis
								necessitatibus molestias. Voluptatibus eos explicabo repellat nesciunt nam vero minima.
							</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>

				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>How can I control if other search engines can link to my
							profile?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis,
								reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit,
								magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>
			</ul> <!-- cd-faq__group -->

			<ul id="delivery" class="cd-faq__group">
				<li class="cd-faq__title">
					<h2>Travel information</h2>
				</li>
				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>What is the maximum number of travellers for whom I can
							make an online reservation?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>.</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>

				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>How can I find your international delivery
							information?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis,
								reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit,
								magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>

				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>Who takes care of shipping?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis,
								reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit,
								magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>

				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>How do returns or refunds work?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum
								eligendi mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto
								architecto impedit explicabo repudiandae qui similique aut iure ipsum quis inventore
								nulla error aliquid alias quia dolorem dolore, odio excepturi veniam odit veritatis. Quo
								iure magnam, et cum. Laudantium, eaque non? Tempore nihil corporis cumque dolor ipsum
								accusamus sapiente aliquid quis ea assumenda deserunt praesentium voluptatibus,
								accusantium a mollitia necessitatibus nostrum voluptatem numquam modi ab, sint rem.</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>

				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>How do I use shipping profiles?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis,
								reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit,
								magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>

				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>How does your UK Next Day Delivery service
							work?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis,
								reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit,
								magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>

				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>How does your Next Day Delivery service work?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis,
								reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit,
								magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>

				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>When will my order arrive?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>Select the "One way” option on the "Book online” page for one-way travel. The "Round
								trip” option is used for booking return point to point travel</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>

				<li class="cd-faq__item">
					<a class="cd-faq__trigger" href="#0"><span>When will my order ship?</span></a>
					<div class="cd-faq__content">
						<div class="text-component">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis,
								reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit,
								magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
						</div>
					</div> <!-- cd-faq__content -->
				</li>
			</ul> <!-- cd-faq__group -->
		</div> <!-- cd-faq__items -->

		<a href="#0" class="cd-faq__close-panel text-replace">Close</a>

		<div class="cd-faq__overlay" aria-hidden="true"></div>
	</section>
    <main style="height:10vh;"></main>
    <?php include("Includes/footer.php"); ?>

</body>

</html>