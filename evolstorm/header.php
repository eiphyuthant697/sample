<?php
/**
 * @package foodica
 */
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>EVOLStorm株式会社（エボルストーム）</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="EVOLStorm株式会社のコーポレートサイト。EVOLStomは包括的なデジタルマーケティングスキルを強みに、クライアント企業様のマーケティング支援や、AMAINなどの自社ブランド開発を行なっています。本サイトではEVOLStormの企業理念やサービス紹介、最新ニュースなどを掲載しています。">
<meta property="og:title" content="EVOLStorm株式会社（エボルストーム）">
<meta property="og:type" content="website">
<meta property="og:url" content="https://evolstorm.com/">
<meta property="og:image" content="https://evolstorm.com./assets/img/pic_logo.png">
<meta property="og:site_name" content="EVOLStorm株式会社（エボルストーム）">
<meta property="og:description" content="EVOLStorm株式会社のコーポレートサイト。EVOLStomは包括的なデジタルマーケティングスキルを強みに、クライアント企業様のマーケティング支援や、AMAINなどの自社ブランド開発を行なっています。本サイトではEVOLStormの企業理念やサービス紹介、最新ニュースなどを掲載しています。">
<?php wp_head(); ?>
<link rel="stylesheet" href="https://use.typekit.net/hdf1ker.css">
<link href="<?php echo get_template_directory_uri(); ?>/assets/css/reset.css">
</head>

<body <?php body_class(); ?>>

    <?php
    wp_body_open();
    ?>
    <header class="header">
        <div class="inner">
            <div class="logo">
                <?php foodica_custom_logo() ?>
            </div>
            <div class="accordion"></div>
            <div class="links">
                <?php if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array(
                        'menu_class'     => 'navbar-wpz dropdown sf-menu',
                        'theme_location' => 'primary'
                    ) );
                } ?>
            </div>
        </div>
    </header>
