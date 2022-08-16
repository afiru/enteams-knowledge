<div class="bg_fff sidebarKnowledge">
    <h1 class="sp_only t_center h1sidebarKnowledge jsh1sidebarKnowledge">KNOWLEDGE MENU</h1>
    <?php $categories = get_categories("parent=1&hide_empty=1&orderby=id&order=asc"); ?>
    <div class="jsnavSidebarKnowledge navSidebarKnowledgeLxc">
    <?php foreach ($categories as $categorie): ?>    
        <nav class="navSidebarKnowledge <?php echo $categorie->slug; ?>NavSidebarKnowledge">
            <a href="<?php echo get_category_link($categorie->cat_ID); ?>" class="display_flex_center titleIcon">
                <?php $icon = get_post_custom_thumbsdata(SCF::get_term_meta( $categorie->cat_ID, 'category', 'iconCat' )); ?>
                <?php if(!empty($icon)): ?>
                    <figure class="iconTitle">                
                        <img src="<?php echo $icon[0]; ?>" alt="<?php echo $categorie->cat_name; ?>アイコン画像" width="<?php echo $icon[1]; ?>" height="<?php echo $icon[2]; ?>">
                    </figure>
                <?php endif; ?>
                <h2 class="h2titleSidebarKnowledge"><?php echo $categorie->cat_name; ?>（<?php echo $categorie->count; ?>）</h2>
            </a>
            <?php $subCats = get_categories("parent=$categorie->cat_ID&hide_empty=1&orderby=id&order=asc"); ?>
            <?php if(!empty($subCats)): ?>
                <ul class="sidebarSubCats">
                    <?php foreach ($subCats as $subCat): ?>
                        <li class="liSidebarSubCats">
                            <a href="<?php echo get_category_link($subCat->cat_ID); ?>" class="display_flex_center sidebarSubCatstitleIconFx">
                                <?php $icon = get_post_custom_thumbsdata(SCF::get_term_meta( $subCat->cat_ID, 'category', 'iconCat' )); ?>
                                <?php if(!empty($icon)): ?>
                                    <figure class="iconTitle">                
                                        <img src="<?php echo $icon[0]; ?>" alt="<?php echo $subCat->cat_name; ?>アイコン画像" width="<?php echo $icon[1]; ?>" height="<?php echo $icon[2]; ?>">
                                    </figure>
                                <?php endif; ?>
                                <h2 class="h2sidebarSubCatstitle"><?php echo $subCat->cat_name; ?>（<?php echo $subCat->count; ?>）</h2>
                            </a>
                        </li>
                        <?php $subSubCats = get_categories("parent=$subCat->cat_ID&hide_empty=1&orderby=id&order=asc"); ?>
                        <?php if(!empty($subSubCats)): ?>
                            <ul class="sidebarSubSubCats">
                                <?php foreach ($subSubCats as $subSubCat): ?>
                                    <li class="liSidebarSubSubCats">
                                        <a href="<?php echo get_category_link($subSubCat->cat_ID); ?>" class="display_flex_center sidebarSubCatstitleIconFx">
                                            <?php $icon = get_post_custom_thumbsdata(SCF::get_term_meta( $subSubCat->cat_ID, 'category', 'iconCat' )); ?>
                                            <?php if(!empty($icon)): ?>
                                                <figure class="iconTitle">                
                                                    <img src="<?php echo $icon[0]; ?>" alt="<?php echo $subSubCat->cat_name; ?>アイコン画像" width="<?php echo $icon[1]; ?>" height="<?php echo $icon[2]; ?>">
                                                </figure>
                                            <?php endif; ?>
                                            <h2 class="h2sidebarSubCatstitle"><?php echo $subSubCat->cat_name; ?>（<?php echo $subSubCat->count; ?>）</h2>
                                        </a>
                                    </li>
                                    <?php $subSubSubCats = get_categories("parent=$subSubCat->cat_ID&hide_empty=1");  ?>
                                    <?php if(!empty($subSubSubCats)): ?>
                                        <ul class="sidebarSubSubSubCats">
                                            <?php foreach ($subSubSubCats as $subSubSubCat): ?>
                                            <li class="liSidebarSubSubSubCats">
                                                <a href="<?php echo get_category_link($subSubSubCat->cat_ID); ?>" class="display_flex_center sidebarSubCatstitleIconFx">
                                                    <?php $icon = get_post_custom_thumbsdata(SCF::get_term_meta( $subSubSubCat->cat_ID, 'category', 'iconCat' )); ?>
                                                    <?php if(!empty($icon)): ?>
                                                        <figure class="iconTitle">                
                                                            <img src="<?php echo $icon[0]; ?>" alt="<?php echo $subSubSubCat->cat_name; ?>アイコン画像" width="<?php echo $icon[1]; ?>" height="<?php echo $icon[2]; ?>">
                                                        </figure>
                                                    <?php endif; ?>
                                                    <h2 class="h2sidebarSubCatstitle"><?php echo $subSubSubCat->cat_name; ?>（<?php echo $subSubSubCat->count; ?>）</h2>
                                                </a>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>                        
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </nav>
    <?php endforeach; ?>
    </div>
</div>