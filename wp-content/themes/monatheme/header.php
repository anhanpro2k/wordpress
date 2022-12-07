<?php
/**
 * The template for displaying header.
 *
 * @package Monamedia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
    <!-- Meta
                ================================================== -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport"
          content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
	<?php wp_site_icon(); ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
    <!-- <link rel="stylesheet" href="<?php echo get_site_url() ?>/template/css/style.css"> -->

    <!-- meta facebook -->
    <meta property="og:locale" content="vi"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content=""/>
    <meta property="og:description" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:image" content=""/>

    <link rel="stylesheet" href="<?php echo get_site_url() ?>/template/dest/style.min.css"/>
    <link rel="stylesheet" href="<?php echo get_site_url() ?>/template/css/backdoor.css"/>
    <link rel="stylesheet" href="<?php echo get_site_url() ?>/template/dest/fonts.css"/>
	<?php wp_head(); ?>
</head>
<?php
if ( wp_is_mobile() ) {
	$body = 'mobile-detect';
} else {
	$body = 'desktop-detect';
}
?>
<body <?php body_class( $body ); ?>>

<!-- HEADER -->
<header class="header flex-center">


    <div class="container-fluid">
        <div class="header-wrap flex-center-between">
            <div class="header-toggle toggle-menu">
                <div class="ham bg-white flex-center flex-column">
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="header-main-wrap container">
                <div class="header-main flex ai-center">
                    <div class="header-logo">
                        <div class="logo-box">
							<?php echo get_custom_logo() ?>
                        </div>
                    </div>

                    <div class="header-menu">
                        <nav class="menu">
							<?php
							wp_nav_menu( array(
								'container'       => false,
								'container_class' => '',
								'menu_class'      => 'menu-list',
								'theme_location'  => 'primary-menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'fallback_cb'     => false,
								'walker'          => new Mona_Walker_Nav_Menu,
							) );
							?>
                        </nav>
                    </div>
                    <div class="header-cta">
						<?php
						$mona_header_sign = get_field( 'mona_header_sign', MONA_PAGE_HOME );
						if ( ! empty( $mona_header_sign ) ) {
							?>

                            <a href="<?php echo $mona_header_sign['url'] ?>" target="_blank" class="btn-main btn-signin"
                               title="Sign In"><?php echo $mona_header_sign['title']; ?></a>
							<?php
						}
						?>
                    </div>
                </div>
            </div>
            <div class="header-lang">
                <div class="lang">
                    <div class="lang-current toggle-lang">
                        <a href="" class="lang-item flex ai-center">
                  <span class="lang-img"
                  ><img src="<?php echo get_site_url(); ?>/template/img/flag-vn.jpg" alt=""
                      /></span>
                        </a>
                    </div>
                    <div class="lang-dropdown toggle-lang-list">
                        <div class="lang-close close-square close-lang-js">
                            <div class="close">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="lang-list">
                            <a href="" class="lang-item flex ai-center">
                    <span class="lang-img"
                    ><img src="<?php echo get_site_url(); ?>/template/img/flag-vn.jpg" alt=""
                        /></span>
                                <span class="lang-text">Vietnamese</span>
                            </a>
                            <a href="" class="lang-item flex ai-center">
                    <span class="lang-img"
                    ><img src="<?php echo get_site_url(); ?>/template/img/flag-usa.jpg" alt=""
                        /></span>
                                <span class="lang-text">English</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- SIDE BOX -->
<div class="sidebox nav-side">
    <div class="sidebox-wrap">
        <div class="container">
            <div class="sidebox-row row jc-between">
                <div class="col-6-md">
                    <nav class="sidebox-nav bg-white">
                        <div class="sidebox-nav__header">
                            <div class="close-square close-menu">
                                <div class="close">
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="sidebox-nav__content">
                            <div class="row">
                                <div class="col-wrap col-6-xs">
                                    <div class="sidebox-nav__menu">
                                        <div class="menu-main menu">
											<?php
											wp_nav_menu( array(
												'container'       => false,
												'container_class' => '',
												'menu_class'      => 'menu-list menu-main__list',
												'theme_location'  => 'primary-menu',
												'before'          => '',
												'after'           => '',
												'link_before'     => '',
												'link_after'      => '',
												'fallback_cb'     => false,
												'walker'          => new Mona_Walker_Main_Menu(),
											) );
											?>
                                        </div>
                                        <div class="menu-sub menu">
											<?php
											wp_nav_menu( array(
												'container'       => false,
												'container_class' => '',
												'menu_class'      => 'menu-list menu-main__list',
												'theme_location'  => 'sub-menu',
												'before'          => '',
												'after'           => '',
												'link_before'     => '',
												'link_after'      => '',
												'fallback_cb'     => false,
												'walker'          => new Mona_Walker_Sub_Menu(),
											) );
											?>
                                        </div>
                                    </div>
                                </div>
								<?php
								$mona_popup_image = get_field( 'mona_popup_image', MONA_PAGE_HOME );
								?>
								<?php
								if ( ! empty( $mona_popup_image ) ) {
									?>
                                    <div class="col-wrap col-6-xs">
                                        <div class="sidebox-nav__img">
											<?php echo wp_get_attachment_image( $mona_popup_image, 'sidebox-image', '', [ 'class' => 'img' ] ); ?>
                                        </div>
                                    </div>
									<?php
								}
								?>
                            </div>
                        </div>
                    </nav>
                </div>
				<?php
				$mona_popup_title = get_field( 'mona_popup_title', MONA_PAGE_HOME );
				?>
                <div class="col-4-lg col-5-md offset-1-md">
                    <div class="sidebox-acc">
						<?php
						if ( ! empty( $mona_popup_title ) ) {
							?>
                            <div class="sidebox-acc__header flex ai-center jc-end">
                                <div class="icon">
                                    <img src="<?php echo get_site_url() ?>/template/img/star.png" alt=""/>
                                </div>
                                <div class="title h5 f-mb"><?php echo $mona_popup_title ?></div>
                            </div>
							<?php
						}
						?>
						<?php
						$mona_popup_mentor = get_field( 'mona_popup_mentor', MONA_PAGE_HOME );
						?>
                        <div class="sidebox-acc__content">
                            <div class="sidebox-acc__card">
                                <figure class="card-box">
									<?php
									$mona_tax_mentor_avatar = get_field( 'mona_tax_mentor_avatar', $mona_popup_mentor );
									?>
									<?php
									if ( ! empty( $mona_tax_mentor_avatar ) ) {
										?>
                                        <div class="card-box__thumb">
                                            <div class="img-inner">
                                                <a href="<?php echo get_permalink( $mona_popup_mentor->term_id ) ?>">
													<?php echo wp_get_attachment_image( $mona_tax_mentor_avatar['ID'], 'icon-96', '', [ 'class' => 'img' ] ); ?>
                                                </a>
                                            </div>
                                        </div>
										<?php
									}
									?>
                                    <figcaption class="card-box__content">
                                        <div class="name"><a
                                                    href="<?php echo get_term_link( $mona_popup_mentor->term_id ) ?>"><?php echo $mona_popup_mentor->name ?></a>
                                        </div>
										<?php
										$mona_tax_mentor_job = get_field( 'mona_tax_mentor_job', $mona_popup_mentor );
										?>
										<?php
										if ( ! empty( $mona_tax_mentor_job ) ) {
											?>
                                            <div class="meta"><?php echo $mona_tax_mentor_job; ?></div>
											<?php
										}
										?>
										<?php
										if ( ! empty( $mona_popup_mentor->description ) ) {
											?>
                                            <div class="desc mona-content">
												<?php echo $mona_popup_mentor->description; ?>
                                            </div>
											<?php
										}
										?>
										<?php
										$mona_tax_mentor_social = get_field( 'mona_tax_mentor_social', $mona_popup_mentor );
										?>
										<?php
										if ( content_exists( $mona_tax_mentor_social ) ) {
											?>
                                            <div class="social">
												<?php
												foreach ( $mona_tax_mentor_social as $key => $social ) {
													?>
                                                    <a href="<?php echo ! empty( $social['social_link'] ) ? $social['social_link']['url'] : '' ?>"
                                                       class="social-link">
														<?php
														if ( ! empty( $social['social_icon'] ) ) {
															echo wp_get_attachment_image( $social['social_icon']['ID'], 'icon-24', '', [ 'class' => 'img' ] );
														}
														?>
                                                    </a>
													<?php
												}
												?>
                                            </div>
											<?php
										}
										?>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
						<?php
						$mona_popup_course = get_field( 'mona_popup_course', MONA_PAGE_HOME );
						?>
                        <div class="sidebox-acc__footer">
                            <div class="sidebox-acc__course">
								<?php
								if ( ! empty( $mona_popup_course ) ) {
									?>
                                    <div class="course-box">
                                        <div class="course-box__header">
											<?php
											$mona_course_icon = get_field( 'mona_course_icon', $mona_popup_course->ID );
											if ( ! empty( $mona_course_icon ) ) {
												?>
                                                <a href="<?php echo get_permalink( $mona_popup_course->ID ); ?>"
                                                   class="course-box__logo">
													<?php echo wp_get_attachment_image( $mona_course_icon, 'icon-32', '', [ 'class' => 'img' ] ); ?>
                                                </a>
												<?php
											}
											?>
                                            <div class="course-box__content">
                                                <div class="course-box__title h5 f-bold">
                                                    <p class="title">
                                                        <a href="<?php echo get_permalink( $mona_popup_course->ID ) ?>"><?php echo $mona_popup_course->post_title ?></a>
                                                    </p>
                                                </div>
												<?php
												$mentor = get_the_terms( $mona_popup_course->ID, 'category_mentor' )[0];
												?>
												<?php
												if ( ! empty( $mentor ) ) {
													?>
                                                    <div class="mentor"><?php echo __( 'Mentor', 'monamedia' ); ?>
                                                        : <?php echo $mentor->name ?></div>
													<?php
												}
												?>
                                            </div>
                                        </div>
                                        <div class="course-box__button">
                                            <a href="<?php echo get_permalink( $mona_popup_course->ID ) ?>"
                                               class="btn-main"><?php echo __( 'Get Started for Free', 'monamedia' ); ?></a>
											<?php
											$mona_course_student_maximum = ! empty( get_field( 'mona_course_student_maximum', $mona_popup_course->ID ) ) ? get_field( 'mona_course_student_maximum', $mona_popup_course->ID ) : 0;
											$current_student             = get_post_meta( $mona_popup_course->ID, 'student', true );
											if ( empty( $current_student ) ) {
												$current_student = 0;
											}
											?>
                                            <div class="enrolled">
                                                <p><?php echo $current_student . "/" . $mona_course_student_maximum . ' ' . __( 'enrolled', 'monamedia' ); ?></p>
                                            </div>
                                        </div>
                                    </div>
									<?php
								}
								?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<body <?php body_class( $body ); ?>>