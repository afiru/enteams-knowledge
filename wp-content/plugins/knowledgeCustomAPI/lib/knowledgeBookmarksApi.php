<?php
class knowledgeBookmarks {
    private $postID;
    private $nowUserID;
    private $nowBookmarsUsers;


    public function __construct() {
        add_action('rest_api_init', array($this, 'knowledgeBookmarksApi'));
    }

    public function knowledgeBookmarksApi() {
        $user = wp_get_current_user();
        $this->nowUserID = (int)$user->ID;
        if (is_user_logged_in()):
            register_rest_route('wp/v2', '/knowledgeBookmarksApi/(?P<id>\d+)', array(
                'methods' => 'get',
                'callback' => array($this, 'knowledgeBookmarksApiConf'),
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

    public function knowledgeBookmarksApiConf($date) {
        $this->postID = (int)$date['id'];
        $nowCheck = $this->checkNowBookmarksUsers();
        if(empty($this->nowUserID)){
            $rest = $this->noneKnowledgeBookmarks();
        }
        elseif($nowCheck==='true'){
            $rest = $this->decrementKnowledgeBookmarks();
        }
        else {
            $rest = $this->changeKnowledgeBookmarks();
        }
        return $rest;
    }


    public function checkNowBookmarksUsers() {
        $nowUserClips = SCF::get_user_meta( $this->nowUserID, 'userBookingPostIDs' );
        $nowUserClips = explode(",", $nowUserClips);
        if(in_array($this->postID,$nowUserClips)){
            return 'true';
        }
        else {
            return 'false';
        }
    }


    public function noneKnowledgeBookmarks() {
        $rest['nowUserID'] = $this->nowUserID;
        $rest['count'] = SCF::get('countPosts',$this->postID);
        $this->nowBookmarsUsers = SCF::get('countPostUsers',$this->postID);
        $rest['userIDs'] = $this->nowBookmarsUsers;
        return $rest;
    }

    public function changeKnowledgeBookmarks() {
        $rest['now'] = 'お気に入り追加';
        $rest['nowUserID'] = $this->nowUserID;
        $nowBookmarksCount = SCF::get('countPosts',$this->postID);
        //役割の整理
        //  $nowBookmarksCountは現在のお気に入り数
        //  $this->nowBookmarsUsers　は　現在のお気に入りをしたユーザーの配列データ
        //  $this->postID　は　お気に入りする記事ID
        //  $this->nowUserID は　現ログイン時のユーザーID
        //
        $rest['count'] = SCF::get('countPosts',$this->postID);
        $rest['count'] = $rest['count']+1;
        //お気に入り数を+1
        update_post_meta($this->postID, 'countPosts', $rest['count']);



        //ユーザーテーブルへお気に入りを追加
        $nowUserBookmarks = SCF::get_user_meta( $this->nowUserID, 'userBookingPostIDs' );
        $nowUserBookmarks = explode(",", $nowUserBookmarks);
        array_push($nowUserBookmarks,$this->postID);
        $nowUserBookmarks = array_unique($nowUserBookmarks);
        $nowUserBookmarks = implode(',', $nowUserBookmarks);
        $rest['userBookings'] = $nowUserBookmarks;
        update_user_meta(  $this->nowUserID , 'userBookingPostIDs', $nowUserBookmarks );

        return $rest;
    }

    public function decrementKnowledgeBookmarks(){
        $rest['now'] = 'お気に入り削除';
        $rest['nowUserID'] = $this->nowUserID;
        $nowBookmarksCount = SCF::get('countPosts',$this->postID);
        //役割の整理
        //  $nowBookmarksCountは現在のお気に入り数
        //  $this->nowBookmarsUsers　は　現在のお気に入りをしたユーザーの配列データ
        //  $this->postID　は　お気に入りする記事ID
        //  $this->nowUserID は　現ログイン時のユーザーID
        //
        $rest['count'] = SCF::get('countPosts',$this->postID);
        $rest['count'] = $rest['count']-1;
        //お気に入り数を-1
        update_post_meta($this->postID, 'countPosts', $rest['count']);

        //ポストに登録されているユーザーを削除
        $index = array_search($this->nowUserID,  $this->nowBookmarsUsers);
        array_splice($this->nowBookmarsUsers, $index);
        update_post_meta($this->postID, 'countPostUsers', $countPostUsers);

        //ユーザーテーブルへお気に入りを追加
        $nowUserBookmarks = SCF::get_user_meta( $this->nowUserID, 'userBookingPostIDs' );
        $nowUserBookmarks = explode(",", $nowUserBookmarks);
        $index = array_search($this->postID, $nowUserBookmarks);
        $rest['userBookingsIndex'] = $index;
        //現在の記事IDを削除
        array_splice($nowUserBookmarks, $index);
        $nowUserBookmarks = array_unique($nowUserBookmarks);
        $nowUserBookmarks = implode(',', $nowUserBookmarks);

        $rest['userBookings'] = $nowUserBookmarks;
        update_user_meta(  $this->nowUserID , 'userBookingPostIDs', $nowUserBookmarks );

        return $rest;
    }
}

$a = new knowledgeBookmarks();