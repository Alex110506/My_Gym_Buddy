from flask import Flask, request, jsonify
from flask_cors import CORS
import json 
from flask import render_template
from langchain_ollama import OllamaLLM
from langchain_core.prompts import ChatPromptTemplate

app = Flask(__name__)
CORS(app)  # This will enable CORS for all routes

template = """
You need to give advice based on fitness information.
Answer the question below.

Question: {question}

Answer:
"""
model = OllamaLLM(model="llama3.2")
prompt = ChatPromptTemplate.from_template(template)
chain = prompt | model
def handle_conversation(user_input):
   result = chain.invoke({"question": user_input})
   return result

@app.route('/run-function', methods=['POST'])
def run_function():
   data = request.get_json()  # Get the JSON data from the request
   # Your Python function logic here
   number = data.get('number')  # Extract the number from the request
   response=handle_conversation(number)
   result = {'message': response}
   return jsonify(result)

if __name__ == '__main__':
   app.run(host='0.0.0.0', port=5000)