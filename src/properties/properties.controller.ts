import { Controller, Get, Post, Body, Patch, Param, Delete } from '@nestjs/common';
import { PropertyService } from './properties.service';
import { PropertyDto } from './dto/Property.dto';
import { CurrentUser } from 'src/decorator/currentUser.decorator';

@Controller('properties')
export class PropertyController {
  constructor(
    private readonly propertyService: PropertyService,
  ) {}

  @Post()
  create(
    @Body() createPropertyDto: PropertyDto,
    @CurrentUser() user: any
  ) {
    return this.propertyService.create(createPropertyDto,user.sub);
  }

  @Get()
  findAll(@CurrentUser() user: any) {
    return this.propertyService.findAll(user.sub);
  }

  @Get(':id')
  findOne(@Param('id') id: string) {
    return this.propertyService.findOne(id);
  }

  @Patch(':id')
  update(@Param('id') id: string, @Body() property: PropertyDto) {
    return this.propertyService.update(id, property);
  }

  @Delete(':id')
  remove(@Param('id') id: string) {
    return this.propertyService.remove(id);
  }
}
