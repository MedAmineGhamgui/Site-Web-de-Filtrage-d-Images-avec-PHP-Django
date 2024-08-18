
from skimage.util import random_noise
from skimage.filters import threshold_otsu
import numpy
from matplotlib.pyplot import *
from matplotlib import pyplot as plt
import imageio
from skimage import color, io, util, transform
import cv2
from cv2 import cvtColor

import datetime
from django import template
from rest_framework.response import Response
from rest_framework.decorators import api_view


@api_view(['GET'])
def getData(request, x):
    #person = {'name': 'dennis', 'age': 28}
    person = {'pre': 'ghamgui', 'name': "data:image/png;base64,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", 'age': x}
    return Response(person)

# def getData(Response, x, y):
 #   person = {'name': 'dennis', 'age': x+y}
  #  return Response(person)


@api_view(['GET'])
def sendData(request, y, z):
    person = {'name': 'dennis', 'age': y+z}
    return Response(person)


@api_view(['GET'])
def imggris(request, pathorig):
    def copyfinchaine(ch, ch1):
        if (ch.find(".jfif") != -1):
            ch1 = ch1+"gray.jfif"
        if (ch.find(".jpeg") != -1):
            ch1 = ch1+"gray.jpeg"
        if (ch.find(".png") != -1):
            ch1 = ch1+"gray.png"
        if (ch.find(".jpg") != -1):
            ch1 = ch1+"gray.jpg"
        return ch1

    x = str('api/images/')
    ch = x + pathorig
    ch0 = ch[:len(ch)-4]

    img = io.imread(ch)

    img_gray = color.rgb2gray(img)

    path = copyfinchaine(ch, ch0)
    #path = ch0+'gray.jpg'

    person = {'p': path}
    io.imsave(path, img_gray,)
    return Response(person)


@api_view(['GET'])
def imginverce(request, pathorig):
    def copyfinchaine(ch, ch1):
        if (ch.find(".jfif") != -1):
            ch1 = ch1+"inverse.jfif"
        if (ch.find(".jpeg") != -1):
            ch1 = ch1+"inverse.jpeg"
        if (ch.find(".png") != -1):
            ch1 = ch1+"inverse.png"
        if (ch.find(".jpg") != -1):
            ch1 = ch1+"inverse.jpg"
        return ch1
    x = str('api/images/')
    ch = x + pathorig
    ch0 = ch[:len(ch)-4]

    img = io.imread(ch)

    imggray = color.rgb2gray(img)
    Img_Inv = 255-imggray
    path = copyfinchaine(ch, ch0)
    #path = ch0+'inverse.jpg'
    person = {'p': path}
    io.imsave(path, Img_Inv,)
    return Response(person)


@api_view(['GET'])
def imghsb(request, pathorig):
    def copyfinchaine(ch, ch1):
        if (ch.find(".jfif") != -1):
            ch1 = ch1+"hsb.jfif"
        if (ch.find(".jpeg") != -1):
            ch1 = ch1+"hsb.jpeg"
        if (ch.find(".png") != -1):
            ch1 = ch1+"hsb.png"
        if (ch.find(".jpg") != -1):
            ch1 = ch1+"hsb.jpg"
        return ch1
    x = str('api/images/')
    ch = x + pathorig
    ch0 = ch[:len(ch)-4]

    img = io.imread(ch)

    img_hsb = color.rgb2hsv(img)
    path = copyfinchaine(ch, ch0)
    #path = ch0+'hsb.jpg'
    person = {'p': path}
    io.imsave(path, img_hsb,)
    return Response(person)


@api_view(['GET'])
def seuil(request, pathorig):
    def copyfinchaine(ch, ch1):
        if (ch.find(".jfif") != -1):
            ch1 = ch1+"seuil.jfif"
        if (ch.find(".jpeg") != -1):
            ch1 = ch1+"seuil.jpeg"
        if (ch.find(".png") != -1):
            ch1 = ch1+"seuil.png"
        if (ch.find(".jpg") != -1):
            ch1 = ch1+"seuil.jpg"
        return ch1

    x = str('api/images/')
    ch = x + pathorig
    ch0 = ch[:len(ch)-4]
    img = io.imread(ch)
    img_gray = color.rgb2gray(img)
    seuil = threshold_otsu(img_gray)
    for i in range(img_gray.shape[0]):
        for j in range(img_gray.shape[1]):
            if (img_gray[i][j] <= seuil):
                img_gray[i][j] = 0
            else:
                img_gray[i][j] = 255
    #path = ch0+'seuil.jpg'
    path = copyfinchaine(ch, ch0)
    io.imsave(path, img_gray,)
    person = {'p': path}
    return Response(person)


@api_view(['GET'])
def bleu(request, pathorig):
    def copyfinchaine(ch, ch1):
        if (ch.find(".jfif") != -1):
            ch1 = ch1+"bleu.jfif"
        if (ch.find(".jpeg") != -1):
            ch1 = ch1+"bleu.jpeg"
        if (ch.find(".png") != -1):
            ch1 = ch1+"bleu.png"
        if (ch.find(".jpg") != -1):
            ch1 = ch1+"bleu.jpg"
        return ch1

    x = str('api/images/')
    ch = x + pathorig
    ch0 = ch[:len(ch)-4]
    img = io.imread(ch)
    B = img.copy()
    B[:, :, 0] = B[:, :, 1] = 0
    path = copyfinchaine(ch, ch0)
    #path = ch0+'bleu.jpg'
    io.imsave(path, B,)
    person = {'p': path}
    return Response(person)


@api_view(['GET'])
def green(request, pathorig):
    def copyfinchaine(ch, ch1):
        if (ch.find(".jfif") != -1):
            ch1 = ch1+"green.jfif"
        if (ch.find(".jpeg") != -1):
            ch1 = ch1+"green.jpeg"
        if (ch.find(".png") != -1):
            ch1 = ch1+"green.png"
        if (ch.find(".jpg") != -1):
            ch1 = ch1+"green.jpg"
        return ch1

    x = str('api/images/')
    ch = x + pathorig
    ch0 = ch[:len(ch)-4]
    img = io.imread(ch)
    B = img.copy()
    B[:, :, 0] = B[:, :, 2] = 0
    path = copyfinchaine(ch, ch0)
    #path = ch0+'green.jpg'
    io.imsave(path, B,)
    person = {'p': path}
    return Response(person)


@api_view(['GET'])
def red(request, pathorig):
    def copyfinchaine(ch, ch1):
        if (ch.find(".jfif") != -1):
            ch1 = ch1+"red.jfif"
        if (ch.find(".jpeg") != -1):
            ch1 = ch1+"red.jpeg"
        if (ch.find(".png") != -1):
            ch1 = ch1+"red.png"
        if (ch.find(".jpg") != -1):
            ch1 = ch1+"red.jpg"
        return ch1

    x = str('api/images/')
    ch = x + pathorig
    ch0 = ch[:len(ch)-4]
    img = io.imread(ch)
    B = img.copy()
    B[:, :, 1] = B[:, :, 2] = 0
    path = copyfinchaine(ch, ch0)
    #path = ch0+'red.jpg'
    io.imsave(path, B,)
    person = {'p': path}
    return Response(person)


@api_view(['GET'])
def modesandp(request, pathorig):
    def copyfinchaine(ch, ch1):
        if (ch.find(".jfif") != -1):
            ch1 = ch1+"samdp.jfif"
        if (ch.find(".jpeg") != -1):
            ch1 = ch1+"samdp.jpeg"
        if (ch.find(".png") != -1):
            ch1 = ch1+"samdp.png"
        if (ch.find(".jpg") != -1):
            ch1 = ch1+"samdp.jpg"
        return ch1

    x = str('api/images/')
    ch = x + pathorig
    ch0 = ch[:len(ch)-4]
    img = io.imread(ch)
    img = random_noise(img, mode='s&p', amount=0.1)
    path = copyfinchaine(ch, ch0)
    #path = ch0+'samdp.jpg'
    io.imsave(path, img,)
    person = {'p': path}
    return Response(person)
