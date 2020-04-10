import requests,json,time,os
r = requests.Session()
userlogin = 'https://www.aobla.com/AppApi.asmx/UserLogin'
updateusertoken = 'https://www.aobla.com/AppApi.asmx/UpdateUserToken'
adcoin = 'https://www.aobla.com/AppApi.asmx/AddUserCoinRecord'
usrdetail = 'https://www.aobla.com/AppApi.asmx/GetUserDetailByMyTab'
hd = {
	"Host": "www.aobla.com",
	"Connection": "keep-alive",
	"Accept": "application/json, text/plain, */*",
	"Origin": "http://localhost",
	"User-Agent": "Mozilla/5.0 (Linux; Android 8.1.0; vivo 1724 Build/OPM1.171019.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/73.0.3683.75 Mobile Safari/537.36",
	"Content-Type": "application/json",
	"Referer": "http://localhost/login",
	"Accept-Language": "id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7",
	"X-Requested-With": "com.ppyd.wewalk"
}
dlog = {"key":"","userAccount":"b9eaf106f6354bcb9f9bcaec08dde6bb","value":"{\"AppID\":1,\"Phone\":\"082324023275\",\"Password\":\"fusionhard\"}"}
datalogin = json.dumps(dlog)
updateutoken = {"key":"","token":"ef9nBvtLIss:APA91bGXpSopbLCkoPbNWHrIvMPqe5y5gGcx8DhIhXyDIKrjwGPFC_4LYsrfxyfbp4HJcksS9izAanjHv7bEeVhq9OOLH-wbNmWAtt49_p5cLU7Z1xf8CxWrFAHeu2H2-_7FcZXOtK1w","userAccount":"b9eaf106f6354bcb9f9bcaec08dde6bb"}
dataupdateusertoken = json.dumps(updateutoken)
addcoin = {"key":"","value":"{\"appID\":1,\"flag\":1,\"coin\":\"15\",\"remark\":\"Energi keberuntungan\"}","userAccount":"b9eaf106f6354bcb9f9bcaec08dde6bb"}
datacoin = json.dumps(addcoin)
usdet = {"key":"","value":"{\"UserAccount\":\"b9eaf106f6354bcb9f9bcaec08dde6bb\"}","userAccount":"b9eaf106f6354bcb9f9bcaec08dde6bb"}
datauserdetail = json.dumps(usdet)
if os.name == 'nt':os.system("cls")
else:os.system("clear")
a = r.post(userlogin,headers=hd,data=datalogin).text
try:
	b = json.loads(a)["userInfo"]
	print('Nomor hp: '+b["Phone"])
	print('Jumlah Coin: ',b["Coin"])
except:
	print("Gagal mengambil data akun")
	print("Tidak apa apa lanjutkan saja :)")
print(" ")
while True:
	try:
		e = r.post(adcoin,headers=hd,data=datacoin).text
		f = r.post(usrdetail,headers=hd,data=datauserdetail).text
		try:
			g = json.loads(f)
			print('Jumlah coinmu Sekarang:',g["Coin"])
		except KeyError:
			print("Gagal mengambil jumlah coin")
		time.sleep(10)
	except requests.exceptions.ConnectionError:
		continue
