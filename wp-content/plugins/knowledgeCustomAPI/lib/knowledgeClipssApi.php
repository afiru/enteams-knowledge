<?php
class knowledgeClipssApi {
    public function __construct() {
        add_action('rest_api_init', array($this, 'knowledgeClipsApi'));
    }

    public function knowledgeClipsApi() {
        $user = wp_get_current_user();
        $this->nowUserID = (int)$user->ID;
        if (is_user_logged_in()):
            register_rest_route('wp/v2', '/knowledgeClipsApi/(?P<id>\d+)', array(
                'methods' => 'get',
                'callback' => array($this, 'knowledgeClipsApiConf'),
                'args' => array(
                    'id' => array(
                        'validate_callback' => function($param, $request, $key) {
                            return is_numeric($param);
                        }
                    ),
                ),
            ));
        endif;
    }
    public function knowledgeClipsApiConf($date) {
        $this->postID = (int)$date['id'];       
        $nowCheck = $this->checkNowClipsUsers();  
        if(empty($this->nowUserID)){
            $rest = $this->noneKnowledgeClips();
        }
        elseif($nowCheck==='true'){
            $rest = $this->decrementKnowledgeClips();
        }
        else {
            $rest = $this->changeKnowledgeClips();
        }
        return $rest;
    }
    
    public function checkNowClipsUsers() {
        $nowUserClips = SCF::get_user_meta( $this->nowUserID, 'userClipsPostIDs' );
        $nowUserClips = explode(",", $nowUserClips);
        if(in_array($this->postID,$nowUserClips)){
            return 'true';            
        }
        else {
            return 'false';
        }
    }
    
    public function noneKnowledgeClips() {
        $rest['nowUserID'] = $this->nowUserID;
        $rest['count'] = SCF::get('countPosts',$this->postID);
        $rest['userIDs'] = $this->nowBookmarsUsers;
        return $rest;
    }
    
    public function changeKnowledgeClips() {
        $rest['now'] = 'クリップ追加';
        $rest['nowUserID'] = $this->nowUserID;
        
        //ユーザーテーブルへクリップを追加
        $nowUserClips = SCF::get_user_meta( $this->nowUserID, 'userClipsPostIDs' );
        $nowUserClips = explode(",", $nowUserClips);
        array_push($nowUserClips,$this->postID);
        $nowUserClips = array_unique($nowUserClips);
        $nowUserClips = implode(',', $nowUserClips);
        $rest['userClipss'] = $nowUserClips;
        update_user_meta(  $this->nowUserID , 'userClipsPostIDs', $nowUserClips );
        
        return $rest;
    }
    
    public function decrementKnowledgeClips(){
        $rest['now'] = 'クリップ削除';
        $rest['nowUserID'] = $this->nowUserID;
        $nowClipsCount = SCF::get('countPosts',$this->postID);

        
        //ユーザーテーブルへクリップを追加
        $nowUserClips = SCF::get_user_meta( $this->nowUserID, 'userClipsPostIDs' );
        $nowUserClips = explode(",", $nowUserClips);
        $index = array_search($this->postID, $nowUserClips);
        $rest['userClipssIndex'] = $index;
        //現在の記事IDを削除
        array_splice($nowUserClips, $index);
        $nowUserClips = array_unique($nowUserClips);
        $nowUserClips = implode(',', $nowUserClips);
        
        $rest['userClipss'] = $nowUserClips;
        update_user_meta(  $this->nowUserID , 'userClipsPostIDs', $nowUserClips );
        
        return $rest;
    }
}
$a = new knowledgeClipssApi();