from django.shortcuts import render,HttpResponse
from django.http import JsonResponse
from django.views.decorators.csrf import csrf_exempt
from .models import Message
import json

# Create your (main part to create route) views here.
@csrf_exempt
def submit_form(request):
    if request.method == 'POST':
        data = json.loads(request.body)
        name = data.get('guestName')
        message = data.get('message')
        #insert value into database
        Message.objects.create(name=name,message=message)
        print(name)
        print(message)
        return JsonResponse({'status':'success'})
    return JsonResponse({'error':'only POST allowed'},status=405)

@csrf_exempt
def comment_show(request):
    data = list(Message.objects.values('id','name','message','created_at'))
    return JsonResponse(data,safe=False)

@csrf_exempt
def after_input(request):
    if request.method == 'POST':
        data = json.loads(request.body)
        nomor = data.get('id')
        data = list(Message.objects.filter(id__gt=nomor).values())
        return JsonResponse(data,safe=False)
