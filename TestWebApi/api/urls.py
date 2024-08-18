from django.urls import path
from . import views
urlpatterns = [
    #path('', views.getData),
    #path('', views.senddata),
    path('api/<int:x>/getdata', views.getData),
    path('api/<int:y>/<int:z>', views.sendData),
    path('api/<str:pathorig>imggris', views.imggris),
    path('api/<str:pathorig>imginverce', views.imginverce),
    path('api/<str:pathorig>imghsb', views.imghsb),
    path('api/<str:pathorig>seuil', views.seuil),
    path('api/<str:pathorig>bleu', views.bleu),
    path('api/<str:pathorig>green', views.green),
    path('api/<str:pathorig>red', views.red),
    path('api/<str:pathorig>modesandp', views.modesandp),

]
