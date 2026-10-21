from sqlalchemy import create_engine, String, Integer
from sqlalchemy.orm import DeclarativeBase, Mapped, mapped_column, Session

# URL format: mysql+mysqlconnector://user:password@host/python_web_db
DATABASE_URL = "mysql+mysqlconnector://root:YOUR_MYSQL_PASSWORD@127.0.0.1/python_web_db"

class Base(DeclarativeBase):
    pass

class User(Base):
    __tablename__ = "orm_users"
    id: Mapped[int] = mapped_column(Integer, primary_key=True, autoincrement=True)
    name: Mapped[str] = mapped_column(String(100), nullable=False)
    email: Mapped[str] = mapped_column(String(255), unique=True, nullable=False)

engine = create_engine(DATABASE_URL, pool_pre_ping=True)
Base.metadata.create_all(engine)

with Session(engine) as session:
    session.add(User(name="Demo User", email="demo.orm@example.com"))
    session.commit()
    print(session.query(User).all())
