import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
import random
import math

digits = [i for i in range(0, 10)]
random_str = ""


for i in range(6):
    index = math.floor(random.random() * 10)
    random_str += str(digits[index])


from_addr='socialmediaatwork123@gmail.com'
to_addr=['asmathav123@gmail.com']
msg=MIMEMultipart()
msg['From']=from_addr
msg['To']=" ,".join(to_addr)

msg['subject']='Activating Your Account'

body= "Hi :),\n\nYour activation code is: "+random_str+"\n\nMany thanks for using\nSocailMedia.!!"

msg.attach(MIMEText(body,'plain'))

email='socialmediaatwork123@gmail.com'
password='Qwerty123@'

mail=smtplib.SMTP('smtp.gmail.com',587)
mail.ehlo()
mail.starttls()
mail.login(email,password)
text=msg.as_string()
mail.sendmail(from_addr,to_addr,text)
mail.quit()