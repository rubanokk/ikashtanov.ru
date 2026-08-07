from django.db import models
from imagekit.models import ImageSpecField
from imagekit.processors import ResizeToFill
from django_ckeditor_5.fields import CKEditor5Field

class Post(models.Model):
    title = models.CharField(max_length=200)
    pub_date = models.DateTimeField("date published")
    text = CKEditor5Field('Text', config_name='extends', blank=True, null=True)
    preview_image = models.ImageField(upload_to='blog/previews/', blank=True, null=True)
    preview_image_thumbnail = ImageSpecField(source='preview_image',
                                      processors=[ResizeToFill(100, 50)],
                                      format='JPEG',
                                      options={'quality': 60})

    def __str__(self):
        return self.title