from django.urls import path
from . import views

urlpatterns = [
    path("submit/",views.submit_form,name='submit_form'),
    path("show/",views.comment_show),
    path("afterInput/",views.after_input)
]