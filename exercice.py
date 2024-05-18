import openai
import mysql.connector

openai.api_key = 'sk-proj-f3yaXtGqXp6ND9msFs43T3BlbkFJc39amcj3lKyHNcOGsuMW'

def generate_exercise(lesson_title):
    prompt = f"Generate 2 multiple-choice exercises for the lesson titled '{lesson_title}'. Each exercise should have 6 questions, and each question should have 4 options."
    response = openai.Completion.create(
        model="text-davinci-003",
        prompt=prompt,
        max_tokens=1500
    )
    return response.choices[0].text.strip()

# Connect to the database
conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="projet"
)
cursor = conn.cursor()

lesson_titles = [
    'JavaScript Variables', 'JavaScript Functions', 'JavaScript Loops', 
    'JavaScript Events', 'JavaScript Arrays', 'JavaScript Objects',
    'C Introduction', 'C Data Types', 'C Control Structures', 
    'C Functions', 'C Pointers', 'C Arrays',
    'Python Introduction', 'Python Data Types', 'Python Control Structures', 
    'Python Functions', 'Python Modules', 'Python Exceptions',
    'SQL Introduction', 'SQL Data Types', 'SQL Joins', 
    'SQL Aggregation', 'SQL Subqueries', 'SQL Indexing'
]

for title in lesson_titles:
    exercises = generate_exercise(title)
    exercises_split = exercises.split("Exercise:")
    
    for exercise in exercises_split[1:]:
        questions = exercise.split("Question:")
        cursor.execute("INSERT INTO exercise (Title, Lesson_Id) VALUES (%s, (SELECT Id_lesson FROM lesson WHERE Titre_lesson = %s))", (title, title))
        exercise_id = cursor.lastrowid
        
        for question in questions[1:]:
            lines = question.strip().split("\n")
            question_text = lines[0].strip()
            cursor.execute("INSERT INTO question (Text, Exercise_Id) VALUES (%s, %s)", (question_text, exercise_id))
            question_id = cursor.lastrowid
            
            for option_text in lines[1:]:
                is_correct = 1 if "(Correct)" in option_text else 0
                option_text = option_text.replace("(Correct)", "").strip()
                cursor.execute("INSERT INTO `option` (Text, Is_Correct, Question_Id) VALUES (%s, %s, %s)", (option_text, is_correct, question_id))
            
    conn.commit()

cursor.close()
conn.close()
