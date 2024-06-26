# 軟體工程期末專題
## SAS
### 新增帳號(管理員權限)
#### 輸入格式(大小寫沒差)
URL:
``
api/acount/add
``

``{"usrname":" ","password":" ","usertype":" "}``

usertype:student,teacher,landlord,admin

#### 輸出格式
帳號已存在

``
['status' => 'error', 'message' => 'Username already exists']
``

密碼不符合要求

``
['status' => 'error', 'message' => 'Invalid password format.']
``

成功註冊

``
['status' => 'success', 'message' => 'Account created successfully']
``
### 登入
#### 輸入格式
URL:
``
api/account/login
``

``
{
"usrname":" hello",
"password":" World888"
}
``
#### 輸出格式
帳號不存在

``
['status' => 'error', 'message' => 'Username not exists']
``

密碼錯誤

``
['status' => 'error', 'message' => 'Password incorrect']
``

登入成功，回傳身份

``
['status' => 'success', 'usertype' => type]
``
### 得到登入者的ID和TYPE
#### 輸入
URL:
``api/account/login_get``
#### 輸出
``{"id":"","usertype":""}``
### 刪除指定帳號
#### 輸入格式
URL:
``api/account/delete``

``{"usrname":"Aa111"}``

### 回傳全部帳號名稱+type
#### 輸入格式
URL:
``
api/account/usrname
``
不需要輸入東西
#### 輸出格式
``{[{
"usrname": "A1105501",
"usertype": "student"
}]}``
### 回傳全部舉報貼文
#### 輸入格式
URL:
``
api/report/get
``

不需要輸入東西
#### 輸出格式

``
{
"report_id": [
"R0",
"R1"
],
"usrname": [
"A1105601",
"A1105601"
],
"report_content": [
[
"P1內容.."
],
[
"P0內容"
]
],
"report_response": [
"已處理",
"已處理"
]
}
``
### 審核舉報貼文
#### 輸入格式
URL:
``
api/report/review
``


``
{
"report_id":"R0",
"report_response":"已處理",
"response_content":"貼文違反社會風俗"
}
``
#### 輸出格式
成功:
``
[
{
"id": "R0",
"title": "P1",
"content": "P1內容..",
"time": "已處理",
"name": "A1105601"
},
{
"id": "R1",
"title": "P0",
"content": "P0內容",
"time": "已處理",
"name": "A1105601"
}
]
``

失敗:
``
return json(['status' => 'error', 'message' => 'Report not found']);``

### 查看舉報內容
#### 輸入
URL:
``api/report/check``

``{
"report_detail":"P0"
}``
#### 輸出
``{"content":"P0內容"}``
### 刪除舉報內容
#### 輸入
URL:
``api/report/delete``

``{
"report_id":"R0"
}``
### 新增和修改學生資料
#### 輸入格式
URL:
``api/account/student_add``

``{
"usrname":" ",
"student_id":" ",
"student_name_ch": " ",
"student_name_eng": " ",
"email":" ",
"grade":" ",
"gender":" ",
"phone":" ",
"teacher_id":" ",
"home_address":" ",
"home_phone":" ",
"home_contact":" "
}``
#### 輸出格式
修改資料:
``['message' => 'Change']``

新增資料:
``['message' => 'Add']``
### 新增和修改教師資料
#### 輸入格式
URL:``api/account/teacher_add``

``{
"usrname":"B1105566",
"teacher_id":"B1105566",
"teacher_name_ch": "王大龍",
"teacher_name_eng": "Wangdai",
"email":"A1105566@mail",
"level":"B1105501",
"gender":"0",
"phone":"0966666666",
"office_address":"花蓮縣",
"office_phone":"123456789"
}``
#### 輸出格式
修改資料:
``['message' => 'Change']``

新增資料:
``['message' => 'Add']``

### 新增和修改房東資料
#### 輸入格式
URL:
``api/account/landlord_add``

``
{
"landlord_id":"Cc111",
"usrname":"Cc111",
"landlord_name_ch": "王大龍",
"landlord_name_eng": "Wangdai",
"email":"A1105566@mail",
"gender":"1",
"phone":"0966666666",
"address":"花蓮縣"
}
``
### 新增和修改管理員資料
#### 輸入
URL:``api/account/admin_add``

``
{
"usrname":"Admin1",
"admin_name_ch": "王二龍",
"admin_name_eng": "Wang2",
"email":"A11042@mail",
"gender":"0",
"phone":"0966666666"
}
``
### 得到個人全部資料(type要輸入正確)
#### 輸入
URL:``api/account/user_get``

``{
"usrname":"A1105501",
"usrtype":"student"
}``
#### 輸出個人資料
全部回傳
### 新增布告欄
#### 輸入
URL:``api/bull/bull_add``

``{
"admin_id":" ",
"detail":" "
}``
#### 輸出
``{"message":"Add"}``
### 回傳全部布告欄
#### 輸入
URL:``api/bull/bull_get``
#### 輸出(我可以改，如果要我每個欄位切出來的話)
``[{"content_id":0,"admin_id":"Admin1","detail":"koll2","date":"2024-06-16"},{"content_id":1,"admin_id":"Admin1","detail":"ko2","date":"2024-06-16"}]``
### 修改布告欄內容
#### 輸入
URL:``api/bull/bull_change``

``{
"content_id":"P0",
"detail":"更新資料"
}``
#### 輸出
``{"message":"Change"}``
### 刪除布告欄
#### 輸入
URL:`` api/bull/bull_delete``

``{"content_id":"A1"}``
#### 輸出
``{"message":"Delete"}``
## HMS
### 填寫廣告
#### 輸入
URL:
``api/AD/add``

``{  
"title":"雅房3000",
"content":"lalalala"
}``


#### 輸出(回傳廣告id)
``{"id":"A3"}``

### 顯示廣告(一般使用者看到的)(已處理)
#### 輸入
URL:
``api/AD/show/user``
#### 輸出
``{"id":["A0"],"title":["0"],"content":["0"],"time":["0000-00-00 00:00:00"],"name":["C1105501"]}``
### 顯示廣告(Admin看到的)
#### 輸入
URL:
``api/AD/show/admin``
#### 輸出
``{"id":["A0","A2"],"title":["0","雅房2000"],"content":["0","haha"],"time":["0000-00-00 00:00:00","2024-06-16 14:31:25"],"name":["C1105501","Cc111"],"response":["已處理","未處理"]}``

### 顯示廣告(全都未處理)
#### 輸入
URL:
``api/AD/show/unchek``

### 審核廣告
#### 輸入
URL:
``api/AD/review``

``{
"id":"A2",
"response":"已處理"
}``
#### 輸出
``{
"message": "改變審核狀態"
}``
### 修改廣告
#### 輸入
URL:
``api/AD/change``

``{  
"id":"A2"
"title":"雅房2900",
"content":"haha"
}``
#### 輸出
``{"message":"success"}``
### 刪除廣告

#### 輸入
URL:
``api/AD/delete``

``{  
"id":"A3"
}``
#### 輸出
``{"message":"delete success"}``

## IRMS
### 創建表單
`api/form/Create`
只需訪問這個網址，就會自動創建表單
動作:根據student內的學生，創建visitform
再去分別創建學生填寫部分以及老師填寫部分
==注意:學生數量大於表單數量時可以正常創建，不過要請求3次api(小BUG)，但表單大於學生就無解，得自己新增==

#### 輸入格式
無需輸入

#### 輸出格式
``['status' => [ ], 'message' => []]``
有學生返回success,沒有學生則返回error

### 填寫表單
`api/form/Fill`
根據使用者類型，決定要填(等同修改)哪種表單，參數限制參考資料庫
使用方法:POST localhost:8000/api/form/Fill

#### 輸入格式
`學生`
{
"usertype": "student",
"student_id": "A1105501",
"landlord_name": "John Doe",
"landlord_phone": "0968333985",
"address": "123 Main St",
"build_type": 2,
"room_type": 1,
"rent": 1000,
"deposit": 2000,
"recommend": 1,
"WoodOrIron": 1,
"alarm": 0,
"escapeRoute": 1,
"doorLock": 1,
"light": 1,
"circuitSafe": 1,
"knowPhone": 1,
"multiSocket": 0,
"extinguisher": 1,
"heater": 0,
"multiRoomBed": 1,
"monitor": 0,
"contract": 1
}

`老師`

{
"usertype": "teacher",
"visitform_id": "1",
"request_rent": 1,
"bills": 1,
"enviroment": 2,
"enviroment_reason": "環境較差，噪音較大",
"live_enviroment": 2,
"live_enviroment_reason": "生活環境整潔，設施完善",
"now": 1,
"now_reason": "學生生活規律，作息良好",
"relationship": 1,
"visitResult": 3,
"visitResult_reason": "家庭關係和睦，學生表現良好",
"other": "無",
"care": 3,
"care_reason": "需要提高對交通安全的認識"
}

#### 輸出格式
``['status' => [ ], 'message' => []]``
成功返回sucess
找不到表單會回傳文字"找不到相應的訪問表單，請先創建表單"

### 瀏覽表單
`api/form/check`
根據不同的usertype,決定可察看的表單類型
`學生` `老師` `管理員`
使用方法:POST localhost:8000/api/form/check
#### 輸入格式

`學生`

{
    "usertype":"student",
    "student_id":"A1105501"
}

`老師`

{
    "usertype":"teacher",
    "teacher_id":"B1105501"
}

`管理員`

{
  "usertype": "admin"
}
#### 輸出格式

`學生`

{
    "visitform_id": "0",
    "landlord_name": "John Doe",
    "landlord_phone": "0968333985",
    "address": "123 Main St",
    "build_type": 2,
    "room_type": 1,
    "rent": 1000,
    "deposit": 2000,
    "recommend": 1,
    "WoodOrIron": 1,
    "alarm": 0,
    "escapeRoute": 1,
    "doorLock": 1,
    "light": 1,
    "circuitSafe": 1,
    "knowPhone": 1,
    "multiSocket": 0,
    "extinguisher": 1,
    "heater": 0,
    "multiRoomBed": 1,
    "monitor": 0,
    "contract": 1,
    "teacher_name_ch": "王老師"
}

`老師`

[
    {
        "visitform_id": "0",
        "request_rent": 1,
        "bills": 1,
        "enviroment": 2,
        "enviroment_reason": 0,
        "live_enviroment": 2,
        "live_enviroment_reason": 0,
        "now": 1,
        "now_reason": "學生生活規律，作息良好",
        "relationship": 1,
        "visitResult": 3,
        "visitResult_reason": "家庭關係和睦，學生表現良好",
        "other": "無",
        "care": 3,
        "care_reason": "需要提高對交通安全的認識",
        "teacher_name_ch": "王老師"
    },
    {
        "visitform_id": "1",
        "request_rent": 1,
        "bills": 1,
        "enviroment": 2,
        "enviroment_reason": 0,
        "live_enviroment": 2,
        "live_enviroment_reason": 0,
        "now": 1,
        "now_reason": "學生生活規律，作息良好",
        "relationship": 1,
        "visitResult": 3,
        "visitResult_reason": "家庭關係和睦，學生表現良好",
        "other": "無",
        "care": 3,
        "care_reason": "需要提高對交通安全的認識",
        "teacher_name_ch": "王老師"
    }
]

`管理員`

[
    {
        "visitform_id": "0",
        "request_rent": 1,
        "bills": 1,
        "enviroment": 2,
        "enviroment_reason": 0,
        "live_enviroment": 2,
        "live_enviroment_reason": 0,
        "now": 1,
        "now_reason": "學生生活規律，作息良好",
        "relationship": 1,
        "visitResult": 3,
        "visitResult_reason": "家庭關係和睦，學生表現良好",
        "other": "無",
        "care": 3,
        "care_reason": "需要提高對交通安全的認識",
        "teacher_name_ch": "王老師",
        "landlord_name": "John Doe",
        "landlord_phone": "0968333985",
        "address": "123 Main St",
        "build_type": 2,
        "room_type": 1,
        "rent": 1000,
        "deposit": 2000,
        "recommend": 1,
        "WoodOrIron": 1,
        "alarm": 0,
        "escapeRoute": 1,
        "doorLock": 1,
        "light": 1,
        "circuitSafe": 1,
        "knowPhone": 1,
        "multiSocket": 0,
        "extinguisher": 1,
        "heater": 0,
        "multiRoomBed": 1,
        "monitor": 0,
        "contract": 1
    },
    {
        "visitform_id": "1",
        "request_rent": 1,
        "bills": 1,
        "enviroment": 2,
        "enviroment_reason": 0,
        "live_enviroment": 2,
        "live_enviroment_reason": 0,
        "now": 1,
        "now_reason": "學生生活規律，作息良好",
        "relationship": 1,
        "visitResult": 3,
        "visitResult_reason": "家庭關係和睦，學生表現良好",
        "other": "無",
        "care": 3,
        "care_reason": "需要提高對交通安全的認識",
        "teacher_name_ch": "王老師",
        "landlord_name": "",
        "landlord_phone": "0",
        "address": "",
        "build_type": 0,
        "room_type": 0,
        "rent": 0,
        "deposit": 0,
        "recommend": 0,
        "WoodOrIron": 0,
        "alarm": 0,
        "escapeRoute": 0,
        "doorLock": 0,
        "light": 0,
        "circuitSafe": 0,
        "knowPhone": 0,
        "multiSocket": 0,
        "extinguisher": 0,
        "heater": 0,
        "multiRoomBed": 0,
        "monitor": 0,
        "contract": 0
    },
    {
        "visitform_id": "2",
        "request_rent": 0,
        "bills": 0,
        "enviroment": 0,
        "enviroment_reason": null,
        "live_enviroment": 0,
        "live_enviroment_reason": null,
        "now": 0,
        "now_reason": null,
        "relationship": 0,
        "visitResult": 0,
        "visitResult_reason": null,
        "other": "",
        "care": 0,
        "care_reason": null,
        "teacher_name_ch": "謝老師",
        "landlord_name": "",
        "landlord_phone": "0",
        "address": "",
        "build_type": 0,
        "room_type": 0,
        "rent": 0,
        "deposit": 0,
        "recommend": 0,
        "WoodOrIron": 0,
        "alarm": 0,
        "escapeRoute": 0,
        "doorLock": 0,
        "light": 0,
        "circuitSafe": 0,
        "knowPhone": 0,
        "multiSocket": 0,
        "extinguisher": 0,
        "heater": 0,
        "multiRoomBed": 0,
        "monitor": 0,
        "contract": 0
    },
    {
        "visitform_id": "3",
        "request_rent": 0,
        "bills": 0,
        "enviroment": 0,
        "enviroment_reason": null,
        "live_enviroment": 0,
        "live_enviroment_reason": null,
        "now": 0,
        "now_reason": null,
        "relationship": 0,
        "visitResult": 0,
        "visitResult_reason": null,
        "other": "",
        "care": 0,
        "care_reason": null,
        "teacher_name_ch": "謝老師",
        "landlord_name": "",
        "landlord_phone": "",
        "address": "",
        "build_type": 0,
        "room_type": 0,
        "rent": 0,
        "deposit": 0,
        "recommend": 0,
        "WoodOrIron": 0,
        "alarm": 0,
        "escapeRoute": 0,
        "doorLock": 0,
        "light": 0,
        "circuitSafe": 0,
        "knowPhone": 0,
        "multiSocket": 0,
        "extinguisher": 0,
        "heater": 0,
        "multiRoomBed": 0,
        "monitor": 0,
        "contract": 0
    }
]

## 個人資料修改
### 密碼修改
`api/account/ChangePassword POST`
#### 輸入格式 
{
    "usrname": "A1105501",
    "oldpassword":"Bb1234",
    "newpassword":"Cc1234"
}
新密碼要符合至少一個大小寫以及有數字，且長度大於五位
#### 輸出格式
'status' => 'error', 'message' => 'Old password is incorrect'
'status' => 'error', 'message' => 'Account not found'
'status' => 'error', 'message' => 'New password does not meet the required format'
'status' => 'success', 'message' => 'Password changed successfully'

### 租屋資料上傳
`api/account/uploadHouseData POST`
#### 輸入格式
{
    "student_id": "A1105501",
    "address": "City, Country",
    "grade": 3,
    "landlord_id": "C1105501",
    "semester": 2,
    "rent": 10000,
    "roommate": "John Doe"
}

#### 輸出格式
'status' => 'success', 'message' => 'Data uploaded successfully'
'status' => 'error', 'message' => 'Failed to upload data'
'status' => 'error', 'message' => 'Database error: '

### 老師底下所有學生的細項
`api/account/teacher/students POST`
#### 輸入格式
{
    "teacher_id":"B1105501"
}
#### 輸出格式
`沒有資料回傳NULL`
[{"usrname":"A1105501","student_id":"A1105501","student_name_ch":"王一號","student_name_eng":"WangOne","email":"a1105501@mail.nuk.edu.tw","grade":3,"gender":1,"phone":"0912345678","teacher_id":"B1105501","home_address":"台中市","home_phone":"0912345678","home_contact":"母親"},{"usrname":"A1105502","student_id":"A1105502","student_name_ch":"王二號","student_name_eng":"WangTwo","email":"a1105502@mail.nuk.edu.tw","grade":3,"gender":1,"phone":"0912345678","teacher_id":"B1105501","home_address":"台中市","home_phone":"0912345678","home_contact":"父親"},{"usrname":"A1105566","student_id":"A1105566","student_name_ch":"王曉龍","student_name_eng":"WangXXX","email":"A1105566@mail","grade":3,"gender":0,"phone":"0966666666","teacher_id":"B1105501","home_address":"花蓮縣","home_phone":"123456789","home_contact":"阿嬤"}]


## 廣告功能
### 瀏覽廣告功能
`api/ad/showAds POST`
#### 輸入格式
無
#### 輸出格式
`沒有資料回傳NULL`
JSON格式的資料庫內容
[{"ADV_ID":"A0","rent_id":"0","ADV_title":"0","usrname":"C1105501","ADV_postdate":"0000-00-00 00:00:00","ADV_content":"0","picture":"0","ADV_likeNum":3,"response":""}]

'status' => 'error', 'message' => 'Database error: ' 

### 查看廣告細項
`api/ad/adDetail POST`
#### 輸入格式
{
    "ADV_ID":"A0"
}
#### 輸出格式
{"ADV_ID":"A0","rent_id":"0","ADV_title":"0","usrname":"C1105501","ADV_postdate":"0000-00-00 00:00:00","ADV_content":"0","picture":"0","ADV_likeNum":3,"response":""}

'status' => 'error', 'message' => 'Database error: '

### 瀏覽廣告所有評論
`api/ad/showAdComment POST`
#### 輸入格式
{
    "ADV_ID":"A0"
}
#### 輸出格式
`沒有資料回傳NULL`
{"ADV_ID":"A0","ADV_comment_id":"AC0","usrname":"A1105502","comment_detail":"comment","rate":4,"picture":"http:\/\/example.com\/picture.jpg","post_comment_time":"2024-06-16 01:04:02"}

'status' => 'error', 'message' => 'Database error: '

### 新增廣告評論
`api/ad/addAdComment POST`
#### 輸入格式
{
    "ADV_ID": "A0",
    "usrname": "john_doe",
    "comment_detail": "advertisement!",
    "rate": 5,
    "picture": "advertisement.jpg"
}
#### 輸出格式
'status' => 'success', 'message' => 'Comment added successfully'
'status' => 'error', 'message' => 'Failed to add comment'
'status' => 'error', 'message' => 'Database error:'

### 針對廣告的按讚功能(評論沒做)
`api/ad/addAdLike POST`
#### 輸入格式
{
    "ADV_ID":"A0"
}
#### 輸出格式
'status' => 'error', 'message' => 'Advertisement not found'
'status' => 'success', 'message' => 'Like added successfully'
'status' => 'error', 'message' => 'Failed to add like: '

### 針對廣告的舉報功能(評論沒做)
`api/ad/reportAd POST`
#### 輸入格式
`usrname`是舉報人(使用者)
{
    "ADV_ID": "A0",
    "usrname": "A1105501" 
}

#### 輸出格式
'status' => 'success', 'message' => 'Advertisement reported successfully'
'status' => 'error', 'message' => 'Failed to report advertisement'
'status' => 'error', 'message' => 'Database error: '

## 交流論壇功能
### 瀏覽貼文功能
`api/post/showPost POST`
#### 輸入格式
無
#### 輸出格式
`沒有資料回傳NULL`
[{"post_id":"P0","usrname":"A1105501","post_detail":"P0內容","picture":"image.jpg","post_likeNum":6,"post_time":"0000-00-00 00:00:00"}]

'status' => 'error', 'message' => 'Database error: '

### 瀏覽特定貼文功能
`api/post/postDetail POST`
#### 輸入格式
{
    "post_id":"P0"
}

#### 輸出格式
`沒有資料回傳NULL`
{"post_id":"P0","usrname":"A1105501","post_detail":"P0內容","picture":"image.jpg","post_likeNum":6,"post_time":"0000-00-00 00:00:00"}

'status' => 'error', 'message' => 'Database error: '

### 瀏覽貼文留言功能
`api/post/showPostComment POST`
#### 輸入格式
{
    "post_id":"P0"
}

#### 輸出格式
`沒有資料回傳NULL`
[{"post_comment_id":"PC0","usrname":"A1105601","post_id":"P0","post_comment_detail":"bad","post_comment_time":"date","picture":""},{"post_comment_id":"PC1","usrname":"A1105601","post_id":"P0","post_comment_detail":"sample","post_comment_time":"2024-06-16 02:25:11","picture":""}]

'status' => 'error', 'message' => 'Database error:'
### 貼文按讚功能(留言沒做)
`api/post/addPostLike POST`
#### 輸入格式
{
    "post_id":"P0"
}
#### 輸出格式
'status' => 'success', 'message' => 'Post liked successfully'

'status' => 'error', 'message' => 'Database error: '

### 新增貼文留言
`api/post/addPostComment POST`
#### 輸入格式
{
    "post_id": "P0",
    "usrname": "A1105501",
    "post_comment_detail": " comment."
}
#### 輸出格式
'status' => 'success', 'message' => 'Post comment added successfully'
'status' => 'error', 'message' => 'Failed to add post comment'
'status' => 'error', 'message' => 'Database error: '

### 舉報貼文(沒做留言)
`api/post/reportPost POST`
#### 輸出格式
{
    "post_id": "P0",
    "usrname": "A1105501"
}
#### 輸出格式
'status' => 'success', 'message' => 'Post reported successfully'
'status' => 'error', 'message' => 'Failed to report advertisement'
'status' => 'error', 'message' => 'Database error: '

### 貼文發文
`api/post/createPost POST`
#### 輸入格式
{
  "usrname": "A1105601",
  "post_detail": "新的貼文內容。",
  "picture": "example.com/image.jpg"
}
#### 輸出格式
'status' => 'success', 'message' => 'Post reported successfully'
'status' => 'error', 'message' => 'Failed to report post'
'status' => 'error', 'message' => 'Database error: '

### 貼文刪除
`api/post/deletePost POST`
#### 輸入格式
{ "post_id":"P1 "}
#### 輸出格式
'status' => 'success', 'message' => 'Post deleted successfully'
'status' => 'error', 'message' => 'Failed to delete post'
'status' => 'error', 'message' => 'Database error: '