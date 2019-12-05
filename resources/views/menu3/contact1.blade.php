@extends('layouts.menu3')

@section('content')


	<style type="text/css">
body.page #pagetitle {
    background-image: url(http://benedicta.evatheme.com/demo3/wp-content/uploads/2018/10/header1.jpg);
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
    background-color: #111111;
    color: #ffffff;
}		
	</style>

		<div id="pagetitle" class=" text-center"><div class="container" style="padding-top: 90px;"><p>Полный список категорий</p><h2>МЕНЮ</h2></div></div>


<div id="page-content" >
	<div id="default_page">
		<div class="container">
			<div class="contentarea clearfix">
				<div class="vc_row wpb_row vc_row-fluid vc_custom_1539130626491">
					<div class="wpb_column vc_column_container vc_col-sm-3">
						<div class="vc_column-inner">
							<div class="wpb_wrapper"></div>
						</div>
					</div>
					<div class="wpb_column vc_column_container vc_col-sm-6">
						<div class="vc_column-inner">
							<div class="wpb_wrapper">
								<div id="ultimate-heading-66585d99d51fdede9" class="uvc-heading ult-adjust-bottom-margin ultimate-heading-66585d99d51fdede9 uvc-1032 " data-hspacer="line_only" data-halign="center" style="text-align:center">
									<div class="uvc-main-heading ult-responsive" data-ultimate-target=".uvc-heading.ultimate-heading-66585d99d51fdede9 h2" data-responsive-json-new="{&quot;font-size&quot;:&quot;desktop:52px;&quot;,&quot;line-height&quot;:&quot;desktop:64px;&quot;}">
										<h2 style="font-family:'Roboto Condensed';font-weight:700;color:#111111;">У ВАС ЕСТЬ ВОПРОСЫ?</h2>
									</div>
									<div class="uvc-heading-spacer line_only" style="margin-top:30px;margin-bottom:30px;height:2px;"><span class="uvc-headings-line" style="border-style: solid; border-bottom-width: 2px; border-color: rgb(166, 157, 109); width: 20px; margin: 0px auto;"></span></div>
									<div class="uvc-sub-heading ult-responsive" data-ultimate-target=".uvc-heading.ultimate-heading-66585d99d51fdede9 .uvc-sub-heading " data-responsive-json-new="{&quot;font-size&quot;:&quot;desktop:22px;&quot;,&quot;line-height&quot;:&quot;desktop:36px;&quot;}" style="font-family:'Roboto';font-weight:normal;font-style:normal;color:#111111;">Опишите подробно свой вопрос и укажите Ваши контакты для связи.</div>
								</div>
							</div>
						</div>
					</div>
					<div class="wpb_column vc_column_container vc_col-sm-3">
						<div class="vc_column-inner">
							<div class="wpb_wrapper"></div>
						</div>
					</div>
				</div>
				<div class="vc_row wpb_row vc_row-fluid vc_custom_1539211162972">
					<div class="wpb_column vc_column_container vc_col-sm-3">
						<div class="vc_column-inner">
							<div class="wpb_wrapper">
								<div class="wpb_single_image wpb_content_element vc_align_left  vc_custom_1539211019332">
									<figure class="wpb_wrapper vc_figure">
										<div class="vc_single_image-wrapper   vc_box_border_grey"><img class="vc_single_image-img " src="/contact-img1-270x470.jpg" width="270" height="470" alt="contact-img1" title="contact-img1"></div>
									</figure>
								</div>
							</div>
						</div>
					</div>
					<div class="wpb_column vc_column_container vc_col-sm-9">
						<div class="vc_column-inner">
							<div class="wpb_wrapper">
								<div class="ult-content-box-container ">
									<div class="ult-content-box" style="background-color: rgba(166, 157, 109, 0.1); padding: 50px; margin: 0px; transition: all 300ms ease 0s; border-color: transparent; box-shadow: none;" data-hover_bg_color="rgba(166,157,109,0.1)" data-hover_box_shadow="none" data-normal_margins="margin:0px;" data-bg="rgba(166,157,109,0.1)">
										<div role="form" class="wpcf7" id="wpcf7-f605-p790-o1" lang="en-US" dir="ltr">
											<div class="screen-reader-response"></div>
											{{-- <form action="/contact" method="post" class="wpcf7-form" novalidate="novalidate"> --}}



											<form action="/contact_us" method="get" class="wpcf7-form" >
												<div style="display: none;"> <input type="hidden" name="_wpcf7" value="605"> <input type="hidden" name="_wpcf7_version" value="5.1.4"> <input type="hidden" name="_wpcf7_locale" value="en_US"> <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f605-p790-o1"> <input type="hidden" name="_wpcf7_container_post" value="790"></div>
												<div class="cstheme_contactform_type2">
													<div class="row">
														{{-- <div class="col-md-4"> <label> Имя*</label><span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required comm-field" aria-required="true" aria-invalid="false"></span></div> --}}
														<div class="col-md-4"> <label> Email или Телефон </label> <span class="wpcf7-form-control-wrap your-email"><input type="text" name="your-contact" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email comm-field" aria-required="true" aria-invalid="false"></span></div>
														{{-- <div class="col-md-4"> <label> Телефон*</label> <span class="wpcf7-form-control-wrap your-phone"><input type="text" name="your-phone" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required comm-field" aria-required="true" aria-invalid="false"></span></div> --}}
													</div>
													<p><label> Сообщение</label> <span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="4" class="wpcf7-form-control wpcf7-textarea" id="msg-contact" aria-invalid="false"></textarea></span></p>
													<p class="text-center">
														<input type="submit" value="Запрос" class="wpcf7-form-control wpcf7-submit"><span class="ajax-loader"></span>
													</p>
												</div>
												<div class="wpcf7-response-output wpcf7-display-none"></div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="vc_row wpb_row vc_row-fluid vc_custom_1539211168060">
					<div class="wpb_column vc_column_container vc_col-sm-12">
						<div class="vc_column-inner">
							<div class="wpb_wrapper">
								<div class="wpb_gmaps_widget wpb_content_element">
									<div class="wpb_wrapper">
										<div class="wpb_map_wraper"> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6304.829986131271!2d-122.4746968033092!3d37.80374752160443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808586e6302615a1%3A0x86bd130251757c00!2sStorey+Ave%2C+San+Francisco%2C+CA+94129!5e0!3m2!1sen!2sus!4v1435826432051" width="600" height="450" frameborder="0" style="border: 0px; pointer-events: none;" allowfullscreen=""></iframe></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				


			</div>
		</div>
	</div>
</div>

@endsection
