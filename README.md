# 軟體工程期末專題
## SAS
### 新增帳號(管理員權限)
#### 輸入格式(大小寫沒差)
URL:
``
api/acount/add
``

``{"usrname":" ","password":" ","usertype":" "}``

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
return json(['status' => 'error', 'message' => 'Report not found']);`
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
