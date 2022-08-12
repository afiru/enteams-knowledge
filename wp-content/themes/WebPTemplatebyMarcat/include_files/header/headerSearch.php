<?php $avive = getNowActive(); ?>
<div class="headerSearch jsheaderSearch">
    <div class="wapper headerSearchWap">
        
        <div class="t_center btmClosedSearchWap">
            <div class="btmClosedSearch jsbtmClosedSearch">閉じる</div>
        </div>
        
        
        <div class="headerSearchLxc">
            <div class="headerinputSearch">
                <form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
                    <div class="pore headerinputSearchLxc">
                        <input class="inputSearch" type="text" name="s" id="s" placeholder="キーワードを入力..."/>
                        <input type="hidden" name="searchCat" value="<?php echo $avive['NowCatID']; ?>">
                        <input class="btmSearchFree" type="image" src="<?php echo get_bloginfo('template_url'); ?>/img/btmHeaderPcGnav03.svg" alt="検索する">
                    </div>
                </form>
            </div>
        </div>
        
        <section class="secHeaderSearchCats">
            <h2 class="h2SecHeaderSearchCats">カテゴリーから検索</h2>
            <?php
                $args = [
                    'child_of' => $avive['NowCatID'],
                    'hide_empty' => 0,
                    'orderby'  => 'id',
                    'order'  => 'ASC',
                ];
            ?>
            <?php $searchCats = get_categories($args); ?>
            <ul class="display_flex_stretch display_row secHeaderSearchCatsFx">
            <?php if(!empty($searchCats)): foreach($searchCats as $searchCat): ?>
                <?php $icon = get_post_custom_thumbsdata(SCF::get_term_meta( $searchCat->cat_ID, 'category', 'iconCat' )); ?>
                <?php if(!empty($icon)): ?>
                    <li class="liHeaderSearchCatsFx">
                        <a class="btmHeaderSearchCatsFx" href="<?php echo get_category_link($searchCat->cat_ID); ?>">
                            <figure class="iconTitle">                
                                <img src="<?php echo $icon[0]; ?>" alt="<?php echo $searchCat->cat_name; ?>アイコン画像" width="<?php echo $icon[1]; ?>" height="<?php echo $icon[2]; ?>">
                            </figure>
                            <h2 class="t_center h2sidebarSubCatstitle"><?php echo $searchCat->cat_name; ?></h2>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; endif; ?>
            </ul>
        </section>
    </div>
</div>