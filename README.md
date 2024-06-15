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
### 刪除指定帳號
#### 輸入格式
URL:
``api/account/delete``

``{"usrname":"Aa111"}``

### 回傳全部帳號名稱
#### 輸入格式
URL:
``
api/account/usrname
``
不需要輸入東西
#### 輸出格式
``{"usrname":["Ca1112","Cc111","ffff6","fffff","Xa1112"]}``
### 回傳全部舉報內容(pass/not pass/空字串(未審核))
#### 輸入格式
URL:
``
api/report/get
``

不需要輸入東西
#### 輸出格式

``
{"report_id":["0","1"],"usrname":["Ca1112","ffff6"],"report_detail":["Zzzzzz","haha"],"report_response":["","pass"]}
``
### 審核舉報內容(pass/not pass/空字串(未審核))
#### 輸入格式
URL:
``
api/report/review
``

``
{
"report_id":"1",
"report_response":"pass"
}
``
#### 輸出格式
成功:
``
{"status":"success","message":"Report reviewed successfully"}
``

失敗:
``
return json(['status' => 'error', 'message' => 'Report not found']);``

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
#### 新增和修改管理員資料
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
### 得到個人資料(type要輸入正確)
#### 輸入
URL:``api/account/user_get``

``{
"usrname":"A1105501",
"usrtype":"student"
}``
#### 輸出個人資料
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
