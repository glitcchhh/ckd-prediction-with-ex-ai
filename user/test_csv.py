

import pandas as pd
import pickle as pk

import warnings

# Ignore all warnings
warnings.filterwarnings("ignore")

df=pd.read_csv("test/test.csv")


file=open("maps.txt","r")
maps=file.read()
file.close()


maps=eval(maps[1:len(maps)-1])


rbc=maps[0]
pc=maps[1]
pcc=maps[2]
ba=maps[3]
htn=maps[4]
dm=maps[5]
cad=maps[6]
appet=maps[7]
pe=maps[8]
ane=maps[9]


df['rbc'].replace(rbc,inplace=True)
df['pc'].replace(pc,inplace=True)
df['pcc'].replace(pcc,inplace=True)
df['ba'].replace(ba,inplace=True)
df['htn'].replace(htn,inplace=True)
df['dm'].replace(dm,inplace=True)
df['cad'].replace(cad,inplace=True)
df['appet'].replace(appet,inplace=True)
df['pe'].replace(pe,inplace=True)
df['ane'].replace(ane,inplace=True)



test_data=df.iloc[:,:25]


clf=pk.load(open("model_rf.pkl","rb"))

test_pred=clf.predict(test_data)


if test_pred==0:
    out="ckd"
else:
    out="notckd"
print(out)

f = open("output_data.txt", "w")
f.write(out)
f.close()