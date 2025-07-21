from django.apps import AppConfig
import threading
import telebot
import os

class MyAppConfig(AppConfig):
    name = 'Telbot'

    def ready(self):
        from django.conf import settings
        if settings.DEBUG and os.environ.get('RUN_MAIN') != 'true':
            return
        
        from .Telbot import run_bot
        thread = threading.Thread(target=run_bot, daemon=True)
        thread.start()
