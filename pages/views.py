from django.shortcuts import render

from blog.models import Post

def index(request):
    posts = Post.objects.order_by("-pub_date")[:2]
    # template = loader.get_template("blog/index.html")
    context = {"posts": posts}
    # return HttpResponse(template.render(context, request))
    return render(request, "pages/index.html", context)
