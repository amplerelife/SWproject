<?php

namespace app\controller;

use app\BaseController;
use think\Request;
use app\model\Account;
use app\model\Post_comment;
use app\model\Post;
use app\model\Report;

class Posts extends BaseController
{
    //瀏覽貼文功能 傳回全部貼文
    public function showPosts()
    {
        try {
            // 從資料庫中選取貼文資料
            $data = Post::select();
            // 將資料轉換為 JSON 格式並返回
            return json( $data);
        } catch (\Exception $e) {
            // 如果出現異常，返回錯誤訊息
            return json(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }
    //查詢貼文功能 傳入post_id
    public function postDetail($post_id)
    {
        try {
            // 從資料庫中選取貼文資料
            $data = Post::where('post_id', $post_id)->find();
            // 將資料轉換為 JSON 格式並返回
            return json( $data);
        } catch (\Exception $e) {
            // 如果出現異常，返回錯誤訊息
            return json(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }
    //瀏覽貼文留言功能 傳入post_id
    public function showPostComment($post_id)
    {
        try {
            // 從資料庫中選取貼文留言資料
            $data = Post_comment::where('post_id', $post_id)->select();
            return json( $data);
            // 將資料轉換為 JSON 格式並返回
        }
        catch (\Exception $e) {
            // 如果出現異常，返回錯誤訊息
            return json(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }
    //貼文按讚功能 傳入post_id
    public function addPostLike($post_id)
    {
        try {
            // 獲取傳入的貼文ID
            $post_id = $post_id;
            // 從資料庫中選取貼文資料
            $data = Post::where('post_id', $post_id)->find();
            // 將資料轉換為 JSON 格式
            $data['post_likeNum'] = $data['post_likeNum'] + 1;
            // 更新貼文按讚數
            $data->save();
            // 回傳成功
            return json(['status' => 'success', 'message' => 'Post liked successfully']);
        } catch (\Exception $e) {
            // 如果出現異常，返回錯誤訊息
            return json(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }
    //貼文留言功能 
    public function addPostComment(Request $request)
    {
        try {
            // 獲取傳入的參數
            $post_id = $request->param('post_id');
            $usrname = $request->param('usrname');
            $post_comment_detail = $request->param('post_comment_detail');
            $picture = $request->param('picture');
            
            // 獲取目前最大的 post_comment_id，如果沒有資料，則設為 0
            if(Post_comment::count() == 0){
                $max_id = 'PC0';
            }else{
                $max_id = Post_comment::where('post_id', $post_id)->order('post_comment_id', 'desc')->find()->post_comment_id;
            }
            
            $number = preg_replace('/[^0-9]/', '', $max_id); // 提取数字部分
            $max_id = $number + 1;
            
            // 創建新的留言記錄
            $postComment = new Post_comment();
            $postComment->post_id = $post_id;
            $postComment->post_comment_id = sprintf('PC%d', $max_id);  // 根據最大值設定新的 ID
            $postComment->usrname = $usrname;
            $postComment->post_comment_detail = $post_comment_detail;
            $postComment->post_comment_time = date('Y-m-d H:i:s'); // 後端負責返回當下時間
            $postComment->picture = $picture; // 可以根據需求設定圖片
            
            // 儲存留言記錄
            $result = $postComment->save();

            if ($result) {
                return json(['status' => 'success', 'message' => 'Post comment added successfully']);
            } else {
                return json(['status' => 'error', 'message' => 'Failed to add post comment']);
            }
            
        } catch (\Exception $e) {
            return json(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }

    public function reportPost(Request $request)
    {
        try {
            // 獲取傳入的參數
            $post_id = $request->param('post_id');
            $usrname = $request->param('usrname');
            $report_reason = $request->param('report_reason'); // 新增的舉報原因

            // 獲取目前最大的 report_id，如果沒有資料，則設為 0
            if (Report::count() == 0) {
                $max_id = 'R0';
            } else {
                $latest_report = Report::order('report_id', 'desc')->find();
                $max_id = preg_replace('/[^0-9]/', '', $latest_report->report_id);
                $max_id = $max_id + 1;
            }

            // 創建新的舉報記錄
            $report = new Report();
            $report->report_id = sprintf('R%d', $max_id); // 根據最大值設定新的 ID
            $report->post_id = $post_id; // 添加 post_id 到報告記錄中
            $report->usrname = $usrname;
            $report->report_reason = $report_reason; // 設置舉報原因
            $report->report_detail = "$post_id"; // 設置舉報詳情
            $report->report_response = ''; // 初始設定管理員處理進度為空
            $report->report_time = date('Y-m-d H:i:s'); // 設置舉報時間

            // 儲存舉報記錄
            $result = $report->save();

            if ($result) {
                return json(['status' => 'success', 'message' => 'Post reported successfully']);
            } else {
                return json(['status' => 'error', 'message' => 'Failed to report post']);
            }

        } catch (\Exception $e) {
            return json(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }

    //貼文發文功能
    public function createPost(Request $request)
    {
        try {
            // 獲取最大的 post_id
            $max_id = Post::order('post_id', 'desc')->find()->post_id ?: 0;
            $post_id = preg_replace('/[^0-9]/', '', $max_id) + 1;

            // 初始化 likeNum
            $likeNum = 0;

            // 使用 new Post() 創建新的模型實例
            $post = new Post();
            $post->post_id = sprintf('P%d', $post_id); // 格式化 post_id
            $post->usrname = $request->param('usrname');
            $post->post_detail = $request->param('post_detail');
            $post->picture = $request->param('picture');
            $post->post_likeNum = $likeNum; // 初始化 likeNum
            $post->post_time = date('Y-m-d H:i:s'); // 使用 PHP 的 date 函數生成當前時間戳

            // 使用 save() 方法保存數據
            $result = $post->save();

            if ($result) {
                return json(['status' => 'success', 'message' => 'Post reported successfully']);
            } else {
                return json(['status' => 'error', 'message' => 'Failed to report post']);
            }
            
        } catch (\Exception $e) {
            return json(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }
    //刪除貼文
    public function deletePost(Request $request)
    {
        try {
            $post_id = $request->param('post_id');
            $post = Post::where('post_id', $post_id)->find();
            if ($post) {
                $result = $post->delete();
                if ($result) {
                    return json(['status' => 'success', 'message' => 'Post deleted successfully']);
                } else {
                    return json(['status' => 'error', 'message' => 'Failed to delete post']);
                }
        }
        } catch (\Exception $e) {
            return json(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }
}
