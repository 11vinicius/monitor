import { Controller, Get, Post, Body, Patch, Param, Delete, UsePipes, UseInterceptors, UploadedFile, BadRequestException } from '@nestjs/common';
import { UserService } from './user.service';
import { FileInterceptor} from '@nestjs/platform-express';
import { diskStorage } from 'multer';
import { UserDto } from './dto/User.dto';
import { Public } from 'src/decorator/public.decorator';


@Controller('users')
export class UserController {
  constructor(private readonly userService: UserService) {}

  @Public()
  @Post()
  @UseInterceptors(
    FileInterceptor('avatar', {
      storage: diskStorage({
        destination: './uploads', 
        filename: (req, file, callback) => {
          if(file != null){
            const uniqueName = `${Date.now()}-${file.originalname}`;
            callback(null, uniqueName);
          }
        },
      }),
    }),
  )
  create(@Body() body: UserDto, @UploadedFile() avatar: Express.Multer.File) {
    return this.userService.create({
      name: body.name,  
      email: body.email,  
      password: body.password,
      avatar: avatar.path
    });
  }

  @Get()
  findAll() {
    return this.userService.findAll();
  }

  @Get(':id')
  findOne(@Param('id') id: string) {
    return this.userService.findOne(id);
  }

  @Patch(':id')
  update(@Param('id') id: string, @Body() body: UserDto) {
    return this.userService.update(id, body);
  }

  @Delete(':id')
  remove(@Param('id') id: string) {
    return this.userService.remove(id);
  }
}


