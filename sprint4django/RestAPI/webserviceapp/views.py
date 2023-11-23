from django.shortcuts import render
from django.http import HttpResponse, JsonResponse
from .models import Tpeliculas, Tcomentarios
from django.views.decorators.csrf import csrf_exempt
import json

# Create your views here.

def pagina_de_prueba(request):
    return HttpResponse("<h1>Hola caracola</h1>")


def devolver_peliculas(request):
    lista = Tpeliculas.objects.all()
    respuesta_final = []
    for fila_sql in lista:
        diccionario = {}
        diccionario['id_pelicula'] = fila_sql.id_pelicula
        diccionario['nombre'] = fila_sql.nombre
        diccionario['url_imagen'] = fila_sql.url_imagen
        diccionario['director'] = fila_sql.director
        diccionario['genero'] = fila_sql.genero
        respuesta_final.append(diccionario)
    return JsonResponse(respuesta_final, safe=False)


def devolver_peliculas_por_id(request, id_solicitado):
    peliculas = Tpeliculas.objects.get(id_pelicula=id_solicitado)
    comentarios = peliculas.tcomentarios_set.all()
    lista_comentarios = []

    for fila_comentario_sql in comentarios:
        diccionario = {}
        diccionario['id_comentario'] = fila_comentario_sql.id_comentario
        diccionario['comentario'] = fila_comentario_sql.comentario
        lista_comentarios.append(diccionario)
    resultado = {
        'id': peliculas.id_pelicula,
        'nombre': peliculas.nombre,
        'url_imagen': peliculas.url_imagen,
        'director': peliculas.director,
        'genero': peliculas.genero,
        'comentarios': lista_comentarios
    }
    return JsonResponse(resultado, json_dumps_params={'ensure_ascii': False})

@csrf_exempt
def guardar_comentario(request, pelicula_id):
    if request.method != 'POST':
        return None

    json_peticion = json.loads(request.body)
    comentario = Tcomentarios()
    comentario.comentario = json_peticion['nuevo_comentario']
    comentario.id_pelicula = Tpeliculas.objects.get(id_pelicula=pelicula_id)
    comentario.save()
    return JsonResponse({'status': 'ok'})
