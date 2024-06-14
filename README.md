# 軟體工程期末專題
## User
### 新增帳號(管理員權限)
#### 輸入格式(大小寫沒差)
AddAcount/:username/:password/:usertype
Ex:http://localhost:8000/AddAcount/Aa111/Aa111/student
#### 輸出格式
帳號已存在

['status' => 'error', 'message' => 'Username already exists']

密碼不符合要求

['status' => 'error', 'message' => 'Password must be at least 5 characters long and include uppercase, lowercase, numbers, and special characters.']

成功註冊

['status' => 'success', 'message' => 'Account created successfully']

### 登入
#### 輸入格式
Login/:username/:password
#### 輸出格式
帳號不存在

['status' => 'error', 'message' => 'Username not exists']

密碼錯誤

['status' => 'error', 'message' => 'Password incorrect']

登入成功，回傳身份

['status' => 'success', 'usertype' => 'student']