import requests	
import json
import youtube_dl
import requests
import time
def detect(url,Tid):
	

	ydl = youtube_dl.YoutubeDL({'outtmpl': '%(id)s%(ext)s'})

	with ydl:
	    result = ydl.extract_info(
		url,
		download=False # We just want to extract the info
	    )

	if 'entries' in result:
	    # Can be a playlist or a list of videos
	    video = result['entries'][0]
	else:
	    # Just a video
	    video = result

	#print(video)
	video_url = video['formats']
	video_url = len(video['formats'])
	#video_url = video['formats'][0]['url']

	SourceArray=[]
	for key in video['formats']:
		#print(key['format'])
		#print(key['url'])
		#print('\n\n\n\n\n\n')
		SourceArray.append({'info':key['format'],'url':key['url']})
	
	row_json = json.dumps(SourceArray)

	#print row_json
	
	payload = {'id': Tid, 'Durl': row_json}
	r = requests.post("http://140.130.36.221/happyY/AJAX_Update.php",data=payload)
	print r.text

while(True):
	try:
		r = requests.get('http://140.130.36.221/happyY/AJAX_SearchNull.php')

		if r.text!="[]":
			result = json.loads(r.text)
			resultSurl = result[0]['Surl']
			Tid= result[0]['id']

			detect('https://www.youtube.com/watch?v='+resultSurl,Tid);
		else:
			print"OK"
		
		time.sleep(10)
	except:
		print"error"
		time.sleep(5)


    

