from django.db import models

# Create your (database) models here.
class Message(models.Model):
    created_at = models.DateField(auto_now_add=True)
    name = models.CharField(max_length=100)
    message = models.TextField()