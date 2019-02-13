package model.pawns;

import java.awt.Image;
import java.awt.Point;
import java.io.File;
import java.io.IOException;

import javax.imageio.ImageIO;

import model.Direction;
import showboard.ISquare;
import showboard.squares.Unpassable;

public class Spell extends Mobile {
	private Point oldPos;
	private boolean comeback;
	private Point p;
	private ISquare[][] squares;
	
	public Spell(Direction direction, Point position) throws IOException {
		super(direction, position, new Image[] {ImageIO.read(new File("../sprites/fireball_1.png")),
												ImageIO.read(new File("../sprites/fireball_2.png")),
												ImageIO.read(new File("../sprites/fireball_3.png")),
												ImageIO.read(new File("../sprites/fireball_4.png")),
												ImageIO.read(new File("../sprites/fireball_5.png"))});
		this.nbrImages = 5;
		this.oldPos = new Point(this.getPosition());
		this.comeback = false;
	}
	
	public Point getOldPosition() {
		return this.oldPos;
	}

	public void comeBack() {
		this.comeback = false;
	}
	
	public void comeBack(Point p, ISquare[][] squares) {
		this.comeback = true;
		this.p = p;
		this.squares = squares;
	}
	
	@Override
	public void move() {
		this.oldPos = new Point(this.getPosition());
		if (comeback) {
			ISquare square = null;
			if (this.p.getX() > this.getX()) {
				square = this.squares[this.getX()+1][this.getY()];
				if (!(square instanceof Unpassable)) {
					this.moveRight();
				}
			}
			if (this.p.getX() < this.getX()) {
				square = this.squares[this.getX()-1][this.getY()];
				if (!(square instanceof Unpassable)) {
					this.moveLeft();
				}
			}
			if (this.p.getY() > this.getY()) {
				square = this.squares[this.getX()][this.getY()+1];
				if (!(square instanceof Unpassable)) {
					this.moveDown();
				}
			}
			if (this.p.getY() < this.getY()) {
				square = this.squares[this.getX()][this.getY()-1];
				if (!(square instanceof Unpassable)) {
					this.moveUp();
				}
			}
		} else {
			switch (this.direction) {
			case UP:
				this.moveUp();
				break;
			case RIGHT:
				this.moveRight();
				break;
			case DOWN:
				this.moveDown();
				break;
			case LEFT:
				this.moveLeft();
				break;
			default:
				break;
			}
		}
	}
}