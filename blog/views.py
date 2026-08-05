from django.shortcuts import get_object_or_404, render
from blog.models import Post

def index(request):
    posts = Post.objects.order_by("-pub_date")[:5]
    # template = loader.get_template("blog/index.html")
    context = {"posts": posts}
    # return HttpResponse(template.render(context, request))
    return render(request, "blog/index.html", context)

def show(request, post_id):
    post = get_object_or_404(Post, pk=post_id)
    return render(request, "blog/show.html", {"post": post})